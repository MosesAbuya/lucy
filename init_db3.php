<?php
$conn = new mysqli("localhost", "root", "", "lucy");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Create contact_messages table
$sql_contact = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    source VARCHAR(50) DEFAULT 'contact',
    is_read TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_contact) === TRUE) {
    echo "Table 'contact_messages' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$conn->close();
echo "Phase 3 DB Initialization complete.";
?>
