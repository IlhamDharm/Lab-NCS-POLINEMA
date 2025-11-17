<?php
/**
 * Session dan Autentikasi Handler
 * Mengelola session user
 */

// Prevent session_start() if session already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/User.php';

class Auth {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    /**
     * Login user
     */
    public function login($email, $password) {
        $result = $this->user->login($email, $password);
        
        if ($result['success']) {
            $_SESSION['user_id'] = $result['data']['id'];
            $_SESSION['username'] = $result['data']['username'];
            $_SESSION['email'] = $result['data']['email'];
            $_SESSION['nama_lengkap'] = $result['data']['nama_lengkap'];
            $_SESSION['logged_in'] = true;
            return ['success' => true, 'message' => 'Login berhasil'];
        }
        
        return $result;
    }

    /**
     * Logout user
     */
    public function logout() {
        session_destroy();
        return ['success' => true, 'message' => 'Logout berhasil'];
    }

    /**
     * Mengecek apakah user sudah login
     */
    public function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    /**
     * Mendapatkan data user yang sedang login
     */
    public function getUser() {
        if ($this->isLoggedIn()) {
            return [
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'],
                'email' => $_SESSION['email'],
                'nama_lengkap' => $_SESSION['nama_lengkap']
            ];
        }
        return null;
    }

    /**
     * Redirect jika belum login
     */
    public function requireLogin($redirect = 'login.php') {
        if (!$this->isLoggedIn()) {
            header("Location: $redirect");
            exit();
        }
    }

    /**
     * Redirect jika sudah login
     */
    public function requireLogout($redirect = 'index.php') {
        if ($this->isLoggedIn()) {
            header("Location: $redirect");
            exit();
        }
    }
}
?>
