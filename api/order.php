<?php
require_once '../admin/config.php';

header('Content-Type: application/json');

// Read input
$raw = file_get_contents('php://input');
$input = json_decode($raw, true);

if (!$input) {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit;
}

// Input sanitization
$order_type = trim($input['order_type'] ?? '');
$full_name = trim($input['full_name'] ?? '');
$email = trim($input['email'] ?? '');
$phone = trim($input['phone'] ?? '');
$quantity = intval($input['quantity'] ?? 1);
$delivery = intval($input['delivery'] ?? 0);
$delivery_address = trim($input['delivery_address'] ?? '');
$mpesa_code = strtoupper(trim($input['mpesa_code'] ?? ''));

if (!$full_name || !$email || !$phone || !$order_type || !$mpesa_code) {
    echo json_encode(['success' => false, 'error' => 'Missing required fields']);
    exit;
}

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

// Generate unique Order Ref
$order_ref = 'LUCY-' . rand(1000, 9999);

// STEP 1: Save to database FIRST
try {
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO orders (order_ref, full_name, email, phone, order_type, quantity, delivery, delivery_address, amount, mpesa_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        echo json_encode(['success' => false, 'error' => 'DB prepare error: ' . $db->error]);
        exit;
    }

    $stmt->bind_param("sssssiisds", $order_ref, $full_name, $email, $phone, $order_type, $quantity, $delivery, $delivery_address, $amount, $mpesa_code);

    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'error' => 'DB execute error: ' . $stmt->error]);
        exit;
    }

    $stmt->close();
    $db->close();
} catch (Throwable $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
    exit;
}

// STEP 2: Return success to user IMMEDIATELY
// STEP 2: Return success and CLOSE the connection before email
$response = json_encode(['success' => true, 'order_ref' => $order_ref]);
header('Content-Type: application/json');
header('Content-Length: ' . strlen($response));
header('Connection: close');
echo $response;

// Flush all output buffers
if (ob_get_level() > 0) ob_end_flush();
flush();

// If on PHP-FPM, finish request
if (function_exists('fastcgi_finish_request')) {
    fastcgi_finish_request();
}

// Suppress all output from this point on
ob_start();

// STEP 3: Try to send emails AFTER response (non-blocking)
// If this fails, the user still got their success response
try {
    require_once '../partials/mailer.php';

    // Notify Admin
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
    sendMail(ADMIN_EMAIL, "New Order - $order_ref - $full_name", $adminBody, true, 'New Order');

    // Notify Customer
    $domain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
    $resubmit_link = $domain . "/resubmit?ref=" . $order_ref;

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

    sendMail($email, "Order Received - Finding Lucy ($order_ref)", $customerBody, true, 'Order Received');
} catch (Throwable $e) {
    // Email failed silently - order is already saved
    error_log("Order $order_ref email failed: " . $e->getMessage());
}
