<?php
/**
 * Language Switcher
 * File ini mengelola session bahasa dan loading file bahasa yang sesuai
 */

// Start session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek jika user mengubah bahasa melalui GET parameter
if (isset($_GET['lang']) && in_array($_GET['lang'], ['id', 'en'])) {
    $_SESSION['language'] = $_GET['lang'];
    // Redirect ke halaman yang sama tanpa parameter lang
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit();
}

// Default bahasa ke Indonesia jika belum dipilih
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'id';
}

// Load language file berdasarkan pilihan
$lang = $_SESSION['language'];
$langFile = __DIR__ . '/lang/' . $lang . '.php';

if (file_exists($langFile)) {
    $lang_strings = include $langFile;
} else {
    // Fallback ke Indonesia jika file tidak ditemukan
    $lang_strings = include __DIR__ . '/lang/id.php';
    $_SESSION['language'] = 'id';
}

/**
 * Fungsi helper untuk mendapatkan string bahasa
 * @param string $key - Key dari array bahasa
 * @param string $default - Default value jika key tidak ditemukan
 * @return string
 */
function t($key, $default = '') {
    global $lang_strings;
    return isset($lang_strings[$key]) ? $lang_strings[$key] : $default;
}

/**
 * Fungsi helper untuk mendapatkan bahasa saat ini
 * @return string - 'id' atau 'en'
 */
function getCurrentLanguage() {
    return $_SESSION['language'] ?? 'id';
}

/**
 * Fungsi untuk mendapatkan URL dengan parameter bahasa
 * @param string $lang - 'id' atau 'en'
 * @return string
 */
function getLangUrl($lang) {
    $currentUrl = $_SERVER['REQUEST_URI'];
    // Hapus parameter lang jika sudah ada
    $url = strtok($currentUrl, '?');
    // Tambah parameter lang yang baru
    return $url . '?lang=' . $lang;
}
?>
