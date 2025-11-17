<?php
/**
 * Logout Handler
 * Menghapus session dan redirect ke login
 */

require_once __DIR__ . '/classes/Auth.php';

$auth = new Auth();
$auth->logout();

// Redirect ke login
header('Location: login.php?msg=logout');
exit();
?>
