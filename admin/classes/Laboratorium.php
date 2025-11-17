<?php
/**
 * Laboratorium Class
 * Mengelola data laboratorium
 */

require_once __DIR__ . '/Database.php';

class Laboratorium {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah laboratorium baru
     */
    public function addLab($data) {
        try {
            $id = $this->db->insert('laboratorium', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Laboratorium berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan laboratorium berdasarkan ID
     */
    public function getLabById($id) {
        return $this->db->fetchOne("SELECT * FROM laboratorium WHERE id = ?", [$id]);
    }

    /**
     * Mendapatkan semua laboratorium
     */
    public function getAllLab() {
        return $this->db->fetchAll("SELECT * FROM laboratorium ORDER BY nama_lab ASC");
    }

    /**
     * Mendapatkan penelitian di laboratorium
     */
    public function getPenelitiLab($lab_id) {
        return $this->db->fetchAll(
            "SELECT p.* FROM penelitian p WHERE p.lab_id = ? ORDER BY p.created_at DESC",
            [$lab_id]
        );
    }

    /**
     * Update laboratorium
     */
    public function updateLab($id, $data) {
        try {
            $this->db->update('laboratorium', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Laboratorium berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus laboratorium
     */
    public function deleteLab($id) {
        try {
            $this->db->delete('laboratorium', ['id' => $id]);
            return ['success' => true, 'message' => 'Laboratorium berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
