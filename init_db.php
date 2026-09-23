<?php
$conn = new mysqli('localhost', 'root', '');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$conn->query("CREATE DATABASE IF NOT EXISTS lucy");
$conn->select_db('lucy');

$queries = [
"CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_ref VARCHAR(20) NOT NULL UNIQUE,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  order_type ENUM('book','ticket','bundle') NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  delivery TINYINT(1) NOT NULL DEFAULT 0,
  delivery_address TEXT NULL,
  amount DECIMAL(10,2) NOT NULL,
  mpesa_code VARCHAR(30) NOT NULL,
  status ENUM('pending','confirmed','fulfilled','cancelled') NOT NULL DEFAULT 'pending',
  notes TEXT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  confirmed_at DATETIME NULL,
  fulfilled_at DATETIME NULL
)",
"CREATE TABLE IF NOT EXISTS gallery (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  caption VARCHAR(500) NULL,
  display_order INT NOT NULL DEFAULT 0,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)",
"CREATE TABLE IF NOT EXISTS admin_sessions (
  token VARCHAR(64) PRIMARY KEY,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)"
];

foreach ($queries as $sql) {
    if (!$conn->query($sql)) {
        echo "Error: " . $conn->error . "\n";
    }
}
echo "DB Init OK\n";
