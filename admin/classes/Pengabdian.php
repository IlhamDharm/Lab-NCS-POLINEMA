<?php
/**
 * Pengabdian Class
 * Mengelola data pengabdian kepada masyarakat
 */

require_once __DIR__ . '/Database.php';

class Pengabdian {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah pengabdian baru
     */
    public function addPengabdian($data) {
        try {
            $id = $this->db->insert('pengabdian_masyarakat', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Pengabdian berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan pengabdian berdasarkan ID
     */
    public function getPengabdianById($id) {
        return $this->db->fetchOne(
            "SELECT pm.*, m.nama_lengkap as nama_ketua FROM pengabdian_masyarakat pm 
             LEFT JOIN dosen d ON pm.ketua_id = d.id
             LEFT JOIN mahasiswa m ON d.user_id = m.id
             WHERE pm.id = ?",
            [$id]
        );
    }

    /**
     * Mendapatkan semua pengabdian
     */
    public function getAllPengabdian($sort = 'created_at DESC', $limit = null) {
        $sql = "SELECT pm.*, m.nama_lengkap as nama_ketua FROM pengabdian_masyarakat pm 
                LEFT JOIN dosen d ON pm.ketua_id = d.id
                LEFT JOIN mahasiswa m ON d.user_id = m.id
                ORDER BY " . $sort;
        
        if ($limit) {
            $sql .= " LIMIT " . $limit;
        }
        
        return $this->db->fetchAll($sql);
    }

    /**
     * Mendapatkan pengabdian berdasarkan tahun
     */
    public function getPengabdianByTahun($tahun) {
        return $this->db->fetchAll(
            "SELECT pm.*, m.nama_lengkap as nama_ketua FROM pengabdian_masyarakat pm 
             LEFT JOIN dosen d ON pm.ketua_id = d.id
             LEFT JOIN mahasiswa m ON d.user_id = m.id
             WHERE pm.tahun = ? 
             ORDER BY pm.created_at DESC",
            [$tahun]
        );
    }

    /**
     * Mendapatkan pengabdian berdasarkan ketua
     */
    public function getPengabdianByKetua($dosen_id) {
        return $this->db->fetchAll(
            "SELECT pm.*, m.nama_lengkap as nama_ketua FROM pengabdian_masyarakat pm 
             LEFT JOIN dosen d ON pm.ketua_id = d.id
             LEFT JOIN mahasiswa m ON d.user_id = m.id
             WHERE pm.ketua_id = ? 
             ORDER BY pm.created_at DESC",
            [$dosen_id]
        );
    }

    /**
     * Mendapatkan anggota pengabdian
     */
    public function getAnggotaPengabdian($pengabdian_id) {
        return $this->db->fetchAll(
            "SELECT ap.id, d.*, m.nama_lengkap, m.email FROM anggota_pengabdian ap
             JOIN dosen d ON ap.dosen_id = d.id
             JOIN mahasiswa m ON d.user_id = m.id
             WHERE ap.pengabdian_id = ?
             ORDER BY m.nama_lengkap",
            [$pengabdian_id]
        );
    }

    /**
     * Menambah anggota pengabdian
     */
    public function addAnggota($pengabdian_id, $dosen_id) {
        try {
            $data = [
                'pengabdian_id' => $pengabdian_id,
                'dosen_id' => $dosen_id
            ];
            $id = $this->db->insert('anggota_pengabdian', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Anggota berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus anggota pengabdian
     */
    public function deleteAnggota($id) {
        try {
            $this->db->delete('anggota_pengabdian', ['id' => $id]);
            return ['success' => true, 'message' => 'Anggota berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Update pengabdian
     */
    public function updatePengabdian($id, $data) {
        try {
            $this->db->update('pengabdian_masyarakat', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Pengabdian berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus pengabdian
     */
    public function deletePengabdian($id) {
        try {
            $this->db->delete('pengabdian_masyarakat', ['id' => $id]);
            return ['success' => true, 'message' => 'Pengabdian berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Cari pengabdian
     */
    public function searchPengabdian($keyword) {
        return $this->db->fetchAll(
            "SELECT pm.*, m.nama_lengkap as nama_ketua FROM pengabdian_masyarakat pm 
             LEFT JOIN dosen d ON pm.ketua_id = d.id
             LEFT JOIN mahasiswa m ON d.user_id = m.id
             WHERE pm.judul_pengabdian ILIKE ? OR pm.deskripsi ILIKE ? OR pm.skema ILIKE ?
             ORDER BY pm.created_at DESC",
            ["%$keyword%", "%$keyword%", "%$keyword%"]
        );
    }
}
?>
