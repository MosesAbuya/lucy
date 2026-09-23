<?php
require_once '../admin/config.php';
$db = getDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $db->real_escape_string($_POST['email'] ?? '');
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $db->prepare("INSERT IGNORE INTO subscribers (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
        
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Invalid email address.']);
        exit;
    }
}
?>
