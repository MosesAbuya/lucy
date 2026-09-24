<?php
// Configuration File
define('ADMIN_PASSWORD_HASH', password_hash('lucy2026', PASSWORD_DEFAULT)); // Simple default password

//Localdb
define('DB_HOST', 'localhost');
define('DB_NAME', 'lucy');
define('DB_USER', 'root');
define('DB_PASS', '');

//Livedb
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'lucymwor_lucy');
// define('DB_USER', 'lucymwor_lucy');
// define('DB_PASS', 'Lucy@2026');

define('ADMIN_EMAIL', 'info@lucymworia.com');
define('TILL_NUMBER', '1717582');

// SMTP Config
define('SMTP_HOST', 'mail.lucymworia.com');
define('SMTP_PORT', 465); // SSL port
define('SMTP_USER', 'info@lucymworia.com');
define('SMTP_PASS', 'Lucy@2026');

// Helper function for DB connection
function getDB()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>