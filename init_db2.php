<?php
require_once 'admin/config.php';
$db = getDB();

$queries = [
    'CREATE TABLE IF NOT EXISTS event_speakers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        title VARCHAR(255),
        role VARCHAR(100),
        bio TEXT,
        image_url VARCHAR(255),
        display_order INT DEFAULT 0
    )',
    'CREATE TABLE IF NOT EXISTS event_programme (
        id INT AUTO_INCREMENT PRIMARY KEY,
        time_slot VARCHAR(100),
        description VARCHAR(255),
        display_order INT DEFAULT 0
    )',
    'CREATE TABLE IF NOT EXISTS site_settings (
        setting_key VARCHAR(100) PRIMARY KEY,
        setting_value TEXT
    )',
    'CREATE TABLE IF NOT EXISTS subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) UNIQUE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )'
];

foreach ($queries as $q) {
    if ($db->query($q)) {
        echo "Success\n";
    } else {
        echo "Error: " . $db->error . "\n";
    }
}

// Default settings
$db->query("INSERT IGNORE INTO site_settings (setting_key, setting_value) VALUES ('event_date', '2026-10-06')");
$db->query("INSERT IGNORE INTO site_settings (setting_key, setting_value) VALUES ('event_time', '18:00')");
$db->query("INSERT IGNORE INTO site_settings (setting_key, setting_value) VALUES ('event_venue', 'To be announced')");
$db->query("INSERT IGNORE INTO site_settings (setting_key, setting_value) VALUES ('event_dress_code', 'Formal / Evening Wear')");

// Insert Kalonzo Musyoka
$db->query("INSERT INTO event_speakers (name, title, role, display_order) VALUES ('H.E. Kalonzo Musyoka', 'Former Vice President of Kenya', 'Chief Guest', 1)");

echo 'DB Init 2 Complete.';
?>
