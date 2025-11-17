<?php
/**
 * Konsultasi Class
 * Mengelola data konsultasi
 */

require_once __DIR__ . '/Database.php';

class Konsultasi {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah konsultasi baru
     */
    public function addKonsultasi($data) {
        try {
            $id = $this->db->insert('konsultasi', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Konsultasi berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan konsultasi berdasarkan ID
     */
    public function getKonsultasiById($id) {
        return $this->db->fetchOne(
            "SELECT k.*, m.nama_lengkap, m.email FROM konsultasi k
             JOIN mahasiswa m ON k.user_id = m.id
             WHERE k.id = ?",
            [$id]
        );
    }

    /**
     * Mendapatkan semua konsultasi
     */
    public function getAllKonsultasi($sort = 'created_at DESC') {
        return $this->db->fetchAll(
            "SELECT k.*, m.nama_lengkap, m.email FROM konsultasi k
             JOIN mahasiswa m ON k.user_id = m.id
             ORDER BY " . $sort
        );
    }

    /**
     * Mendapatkan konsultasi user
     */
    public function getKonsultasiByUser($user_id) {
        return $this->db->fetchAll(
            "SELECT * FROM konsultasi WHERE user_id = ? ORDER BY created_at DESC",
            [$user_id]
        );
    }

    /**
     * Mendapatkan konsultasi berdasarkan jenis
     */
    public function getKonsultasiByJenis($jenis) {
        return $this->db->fetchAll(
            "SELECT k.*, m.nama_lengkap FROM konsultasi k
             JOIN mahasiswa m ON k.user_id = m.id
             WHERE k.jenis_konsultasi = ?
             ORDER BY k.created_at DESC",
            [$jenis]
        );
    }

    /**
     * Mendapatkan konsultasi berdasarkan status
     */
    public function getKonsultasiByStatus($status) {
        return $this->db->fetchAll(
            "SELECT k.*, m.nama_lengkap FROM konsultasi k
             JOIN mahasiswa m ON k.user_id = m.id
             WHERE k.status = ?
             ORDER BY k.created_at DESC",
            [$status]
        );
    }

    /**
     * Mendapatkan konsultasi berdasarkan tanggal
     */
    public function getKonsultasiByTanggal($tanggal) {
        return $this->db->fetchAll(
            "SELECT k.*, m.nama_lengkap FROM konsultasi k
             JOIN mahasiswa m ON k.user_id = m.id
             WHERE k.tanggal_konsultasi = ?
             ORDER BY k.waktu_konsultasi",
            [$tanggal]
        );
    }

    /**
     * Update konsultasi
     */
    public function updateKonsultasi($id, $data) {
        try {
            $this->db->update('konsultasi', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Konsultasi berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus konsultasi
     */
    public function deleteKonsultasi($id) {
        try {
            $this->db->delete('konsultasi', ['id' => $id]);
            return ['success' => true, 'message' => 'Konsultasi berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
