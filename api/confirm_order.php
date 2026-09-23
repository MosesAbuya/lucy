<?php
require_once '../admin/config.php';
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

if (!$input || empty($input['id'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit;
}

$id = intval($input['id']);
$db = getDB();

$stmt = $db->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    echo json_encode(['success' => false, 'error' => 'Order not found']);
    exit;
}

$updateStmt = $db->prepare("UPDATE orders SET status = 'confirmed', confirmed_at = NOW() WHERE id = ?");
$updateStmt->bind_param("i", $id);

if ($updateStmt->execute()) {
    // Send email to customer
    $to = $order['email'];
    $subject = "Your Order is Confirmed - Finding Lucy";
    $body = "Dear {$order['full_name']},<br><br>"
          . "Your payment of KES " . number_format($order['amount']) . " has been verified and your order is approved.<br><br>"
          . "<strong>Order Reference:</strong> {$order['order_ref']}<br>"
          . "<strong>Item:</strong> " . ucfirst($order['order_type']) . "<br><br>";

    if ($order['order_type'] == 'ticket' || $order['order_type'] == 'bundle') {
        $body .= "<strong style='color: #B8935A;'>TICKET NUMBER: {$order['order_ref']}</strong><br>";
        $body .= "Please present this email or your Ticket Number at the event entrance.<br><br>";
    }
    
    if ($order['order_type'] == 'book' || $order['order_type'] == 'bundle') {
        if ($order['delivery'] == 1) {
            $body .= "<strong>ORDER DISPATCH INFO:</strong><br>";
            $body .= "Your book is currently being processed for dispatch.<br>";
            $body .= "<strong>Delivery Address:</strong> {$order['delivery_address']}<br>";
            $body .= "Our delivery team will contact you on {$order['phone']} before dropping it off.<br><br>";
        } else {
            $body .= "<strong>COLLECTION INFO:</strong><br>";
            $body .= "You may collect your book at the event or by arrangement.<br><br>";
        }
    }
    
    $body .= "We look forward to seeing you.<br><br>Warmly,<br><strong>Lucy Mworia</strong>";
    
    require_once '../partials/mailer.php';
    sendMail($to, $subject, $body, true, 'Order Confirmed');
    
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to update order']);
}

$stmt->close();
$updateStmt->close();
$db->close();
?>
