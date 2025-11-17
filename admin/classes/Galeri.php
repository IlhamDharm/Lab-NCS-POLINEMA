<?php
/**
 * Galeri Class
 * Mengelola data galeri foto dan video
 */

require_once __DIR__ . '/Database.php';

class Galeri {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah galeri baru
     */
    public function addGaleri($data) {
        try {
            $id = $this->db->insert('galeri', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Galeri berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan galeri berdasarkan ID
     */
    public function getGaleriById($id) {
        return $this->db->fetchOne("SELECT * FROM galeri WHERE id = ?", [$id]);
    }

    /**
     * Mendapatkan semua galeri
     */
    public function getAllGaleri($limit = null) {
        $sql = "SELECT * FROM galeri ORDER BY created_at DESC";
        if ($limit) $sql .= " LIMIT " . $limit;
        return $this->db->fetchAll($sql);
    }

    /**
     * Mendapatkan galeri berdasarkan kategori
     */
    public function getGaleriByKategori($kategori) {
        return $this->db->fetchAll(
            "SELECT * FROM galeri WHERE kategori = ? ORDER BY created_at DESC",
            [$kategori]
        );
    }

    /**
     * Mendapatkan galeri berdasarkan jenis (foto/video)
     */
    public function getGaleriByJenis($jenis) {
        return $this->db->fetchAll(
            "SELECT * FROM galeri WHERE jenis = ? ORDER BY created_at DESC",
            [$jenis]
        );
    }

    /**
     * Update galeri
     */
    public function updateGaleri($id, $data) {
        try {
            $this->db->update('galeri', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Galeri berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus galeri
     */
    public function deleteGaleri($id) {
        try {
            $this->db->delete('galeri', ['id' => $id]);
            return ['success' => true, 'message' => 'Galeri berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
