<?php
/**
 * User/Mahasiswa Class
 * Mengelola data pengguna dan mahasiswa
 */

require_once __DIR__ . '/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Register user baru
     */
    public function register($data) {
        try {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $id = $this->db->insert('mahasiswa', $data);
            return ['success' => true, 'id' => $id, 'message' => 'User berhasil didaftarkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Login user
     */
    public function login($email, $password) {
        try {
            $user = $this->db->fetchOne(
                "SELECT * FROM mahasiswa WHERE email = ?",
                [$email]
            );

            if ($user && password_verify($password, $user['password']) && $user['is_active']) {
                return ['success' => true, 'data' => $user];
            }
            return ['success' => false, 'message' => 'Email atau password salah'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan user berdasarkan ID
     */
    public function getUserById($id) {
        return $this->db->fetchOne(
            "SELECT * FROM mahasiswa WHERE id = ?",
            [$id]
        );
    }

    /**
     * Mendapatkan user berdasarkan email
     */
    public function getUserByEmail($email) {
        return $this->db->fetchOne(
            "SELECT * FROM mahasiswa WHERE email = ?",
            [$email]
        );
    }

    /**
     * Mendapatkan semua user
     */
    public function getAllUsers() {
        return $this->db->fetchAll("SELECT * FROM mahasiswa ORDER BY created_at DESC");
    }

    /**
     * Update profil user
     */
    public function updateProfile($id, $data) {
        try {
            $this->db->update('mahasiswa', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Profil berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Ubah password
     */
    public function changePassword($id, $oldPassword, $newPassword) {
        try {
            $user = $this->getUserById($id);
            if (!$user) {
                return ['success' => false, 'message' => 'User tidak ditemukan'];
            }

            if (!password_verify($oldPassword, $user['password'])) {
                return ['success' => false, 'message' => 'Password lama tidak sesuai'];
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $this->db->update('mahasiswa', ['password' => $hashedPassword], ['id' => $id]);
            return ['success' => true, 'message' => 'Password berhasil diubah'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mengaktifkan/menonaktifkan user
     */
    public function toggleActive($id, $status) {
        try {
            $this->db->update('mahasiswa', ['is_active' => $status], ['id' => $id]);
            return ['success' => true, 'message' => 'Status user berhasil diubah'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus user
     */
    public function deleteUser($id) {
        try {
            $this->db->delete('mahasiswa', ['id' => $id]);
            return ['success' => true, 'message' => 'User berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
