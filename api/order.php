<?php
require_once '../admin/config.php';

header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit;
}

$db = getDB();

// Input sanitization
$order_type = $db->real_escape_string($input['order_type'] ?? '');
$full_name = $db->real_escape_string($input['full_name'] ?? '');
$email = $db->real_escape_string($input['email'] ?? '');
$phone = $db->real_escape_string($input['phone'] ?? '');
$quantity = intval($input['quantity'] ?? 1);
$delivery = intval($input['delivery'] ?? 0);
$delivery_address = $db->real_escape_string($input['delivery_address'] ?? '');
$mpesa_code = $db->real_escape_string(strtoupper($input['mpesa_code'] ?? ''));

if (!$full_name || !$email || !$phone || !$order_type || !$mpesa_code) {
    echo json_encode(['success' => false, 'error' => 'Missing required fields']);
    exit;
}

// Generate unique Order Ref
$order_ref = 'LUCY-' . rand(1000, 9999);

// Calculate amount server-side
$amount = 0;
if ($order_type === 'book') $amount = 2500;
elseif ($order_type === 'ticket') $amount = 3500;
elseif ($order_type === 'bundle') $amount = 6000;
else {
    echo json_encode(['success' => false, 'error' => 'Invalid order type']);
    exit;
}

$amount = $amount * $quantity;
if ($delivery === 1 && in_array($order_type, ['book', 'bundle'])) {
    $amount += 300;
} else {
    $delivery = 0; 
}

$stmt = $db->prepare("INSERT INTO orders (order_ref, full_name, email, phone, order_type, quantity, delivery, delivery_address, amount, mpesa_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssiisds", $order_ref, $full_name, $email, $phone, $order_type, $quantity, $delivery, $delivery_address, $amount, $mpesa_code);

if ($stmt->execute()) {
    require_once '../partials/mailer.php';
    
    // 1. Notify Admin
    $adminTo = ADMIN_EMAIL;
    $adminSubject = "New Order - $order_ref - $full_name";
    $adminBody = "New order received!<br><br>"
          . "<strong>Order Ref:</strong> $order_ref<br>"
          . "<strong>Name:</strong> $full_name<br>"
          . "<strong>Email:</strong> $email<br>"
          . "<strong>Phone:</strong> $phone<br>"
          . "<strong>Item:</strong> $order_type x $quantity<br>"
          . "<strong>Amount:</strong> KES " . number_format($amount) . "<br>"
          . "<strong>M-Pesa Code:</strong> $mpesa_code<br>"
          . "<strong>Delivery:</strong> " . ($delivery ? "Yes - $delivery_address" : "No (Pickup / Ticket)") . "<br><br>"
          . "Please verify payment against Till Number " . TILL_NUMBER . " and confirm in the admin dashboard.";
    sendMail($adminTo, $adminSubject, $adminBody, true, 'New Order');
    
    // 2. Notify Customer with Resubmit Link
    $customerSubject = "Order Received - Finding Lucy ($order_ref)";
    $domain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $base_dir = str_replace('/api/order.php', '', $_SERVER['REQUEST_URI']);
    $resubmit_link = $domain . $base_dir . "/resubmit?ref=" . $order_ref;
    
    $customerBody = "Dear $full_name,<br><br>"
          . "Thank you for your order! We have received your M-Pesa transaction code ($mpesa_code) for the amount of KES " . number_format($amount) . ".<br><br>"
          . "<strong>Order Reference:</strong> $order_ref<br>"
          . "<strong>Item:</strong> " . ucfirst($order_type) . "<br><br>"
          . "Our team is verifying the payment. You will receive a final confirmation email shortly.<br><br>"
          . "<strong style='color: #B8935A;'>FAILSAFE LINK:</strong><br>"
          . "In case you had a problem with typing in the transaction code earlier, you can type it again using the link below. Please ignore this if you already provided the correct code.<br>"
          . "<a href='$resubmit_link' style='color: #B8935A; text-decoration: underline;'>$resubmit_link</a><br><br>"
          . "Warmly,<br>"
          . "<strong>Lucy Mworia Team</strong>";
          
    sendMail($email, $customerSubject, $customerBody, true, 'Order Received');
    
    echo json_encode(['success' => true, 'order_ref' => $order_ref]);
} else {
    echo json_encode(['success' => false, 'error' => 'Database error. Please try again.']);
}

$stmt->close();
$db->close();
?>
