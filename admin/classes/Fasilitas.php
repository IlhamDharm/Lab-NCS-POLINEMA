<?php
/**
 * Fasilitas Class
 * Mengelola data fasilitas dan peminjaman
 */

require_once __DIR__ . '/Database.php';

class Fasilitas {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah fasilitas baru
     */
    public function addFasilitas($data) {
        try {
            $id = $this->db->insert('fasilitas', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Fasilitas berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan fasilitas berdasarkan ID
     */
    public function getFasilitasById($id) {
        return $this->db->fetchOne("SELECT * FROM fasilitas WHERE id = ?", [$id]);
    }

    /**
     * Mendapatkan semua fasilitas
     */
    public function getAllFasilitas($sort = 'nama_fasilitas ASC') {
        return $this->db->fetchAll("SELECT * FROM fasilitas ORDER BY " . $sort);
    }

    /**
     * Mendapatkan fasilitas berdasarkan jenis
     */
    public function getFasilitasByJenis($jenis) {
        return $this->db->fetchAll(
            "SELECT * FROM fasilitas WHERE jenis = ? ORDER BY nama_fasilitas",
            [$jenis]
        );
    }

    /**
     * Mendapatkan fasilitas yang tersedia
     */
    public function getFasilitasTersedia() {
        return $this->db->fetchAll(
            "SELECT * FROM fasilitas WHERE status = 'tersedia' ORDER BY nama_fasilitas"
        );
    }

    /**
     * Update fasilitas
     */
    public function updateFasilitas($id, $data) {
        try {
            $this->db->update('fasilitas', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Fasilitas berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus fasilitas
     */
    public function deleteFasilitas($id) {
        try {
            $this->db->delete('fasilitas', ['id' => $id]);
            return ['success' => true, 'message' => 'Fasilitas berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Menambah peminjaman fasilitas
     */
    public function addPeminjaman($data) {
        try {
            $id = $this->db->insert('peminjaman_fasilitas', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Peminjaman berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan peminjaman berdasarkan ID
     */
    public function getPeminjamanById($id) {
        return $this->db->fetchOne(
            "SELECT pf.*, m.nama_lengkap, f.nama_fasilitas FROM peminjaman_fasilitas pf
             JOIN mahasiswa m ON pf.user_id = m.id
             JOIN fasilitas f ON pf.fasilitas_id = f.id
             WHERE pf.id = ?",
            [$id]
        );
    }

    /**
     * Mendapatkan semua peminjaman
     */
    public function getAllPeminjaman($sort = 'created_at DESC') {
        return $this->db->fetchAll(
            "SELECT pf.*, m.nama_lengkap, f.nama_fasilitas FROM peminjaman_fasilitas pf
             JOIN mahasiswa m ON pf.user_id = m.id
             JOIN fasilitas f ON pf.fasilitas_id = f.id
             ORDER BY " . $sort
        );
    }

    /**
     * Mendapatkan peminjaman user
     */
    public function getPeminjamanByUser($user_id) {
        return $this->db->fetchAll(
            "SELECT pf.*, f.nama_fasilitas FROM peminjaman_fasilitas pf
             JOIN fasilitas f ON pf.fasilitas_id = f.id
             WHERE pf.user_id = ?
             ORDER BY pf.created_at DESC",
            [$user_id]
        );
    }

    /**
     * Mendapatkan peminjaman berdasarkan status
     */
    public function getPeminjamanByStatus($status) {
        return $this->db->fetchAll(
            "SELECT pf.*, m.nama_lengkap, f.nama_fasilitas FROM peminjaman_fasilitas pf
             JOIN mahasiswa m ON pf.user_id = m.id
             JOIN fasilitas f ON pf.fasilitas_id = f.id
             WHERE pf.status = ?
             ORDER BY pf.created_at DESC",
            [$status]
        );
    }

    /**
     * Update peminjaman
     */
    public function updatePeminjaman($id, $data) {
        try {
            $this->db->update('peminjaman_fasilitas', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Peminjaman berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus peminjaman
     */
    public function deletePeminjaman($id) {
        try {
            $this->db->delete('peminjaman_fasilitas', ['id' => $id]);
            return ['success' => true, 'message' => 'Peminjaman berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
