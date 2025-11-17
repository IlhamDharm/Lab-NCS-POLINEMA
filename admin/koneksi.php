<?php
/**
 * Database Connection Configuration
 * File ini untuk kompatibilitas backward compatibility
 * Gunakan class Database dari classes/Database.php untuk koneksi baru
 */

require_once __DIR__ . '/classes/Database.php';

// Buat instance database
$db = new Database();
$pdo = $db->getPdo();
?>
