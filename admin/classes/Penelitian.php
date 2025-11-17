<?php
/**
 * Penelitian Class
 * Mengelola data penelitian
 */

require_once __DIR__ . '/Database.php';

class Penelitian {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah penelitian baru
     */
    public function addPenelitian($data) {
        try {
            $id = $this->db->insert('penelitian', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Penelitian berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan penelitian berdasarkan ID
     */
    public function getPenelitianById($id) {
        return $this->db->fetchOne(
            "SELECT p.*, l.nama_lab FROM penelitian p 
             LEFT JOIN laboratorium l ON p.lab_id = l.id 
             WHERE p.id = ?",
            [$id]
        );
    }

    /**
     * Mendapatkan semua penelitian
     */
    public function getAllPenelitian($sort = 'created_at DESC', $limit = null) {
        $sql = "SELECT p.*, l.nama_lab FROM penelitian p 
                LEFT JOIN laboratorium l ON p.lab_id = l.id 
                ORDER BY " . $sort;
        
        if ($limit) {
            $sql .= " LIMIT " . $limit;
        }
        
        return $this->db->fetchAll($sql);
    }

    /**
     * Mendapatkan penelitian terbaru
     */
    public function getLatestPenelitian($limit = 10) {
        return $this->getAllPenelitian('p.created_at DESC', $limit);
    }

    /**
     * Mendapatkan penelitian paling banyak dikutip
     */
    public function getMostCitedPenelitian($limit = 10) {
        return $this->getAllPenelitian('p.jumlah_sitasi DESC', $limit);
    }

    /**
     * Mendapatkan penelitian paling lama
     */
    public function getOldestPenelitian($limit = 10) {
        return $this->getAllPenelitian('p.tahun ASC', $limit);
    }

    /**
     * Mendapatkan penelitian berdasarkan laboratorium
     */
    public function getPenelitianByLab($lab_id) {
        return $this->db->fetchAll(
            "SELECT p.*, l.nama_lab FROM penelitian p 
             LEFT JOIN laboratorium l ON p.lab_id = l.id 
             WHERE p.lab_id = ? 
             ORDER BY p.created_at DESC",
            [$lab_id]
        );
    }

    /**
     * Mendapatkan peneliti untuk penelitian tertentu
     */
    public function getPenelitiByPenelitian($penelitian_id) {
        return $this->db->fetchAll(
            "SELECT pp.id, pp.peran, d.*, m.nama_lengkap, m.email FROM peneliti_penelitian pp
             JOIN dosen d ON pp.dosen_id = d.id
             JOIN mahasiswa m ON d.user_id = m.id
             WHERE pp.penelitian_id = ?
             ORDER BY pp.peran DESC",
            [$penelitian_id]
        );
    }

    /**
     * Menambah peneliti ke penelitian
     */
    public function addPeneliti($penelitian_id, $dosen_id, $peran = 'anggota') {
        try {
            $data = [
                'penelitian_id' => $penelitian_id,
                'dosen_id' => $dosen_id,
                'peran' => $peran
            ];
            $id = $this->db->insert('peneliti_penelitian', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Peneliti berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Update penelitian
     */
    public function updatePenelitian($id, $data) {
        try {
            $this->db->update('penelitian', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Penelitian berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Tambah sitasi
     */
    public function addSitasi($id, $jumlah = 1) {
        try {
            $penelitian = $this->getPenelitianById($id);
            $newSitasi = ($penelitian['jumlah_sitasi'] ?? 0) + $jumlah;
            $this->db->update('penelitian', ['jumlah_sitasi' => $newSitasi], ['id' => $id]);
            return ['success' => true, 'message' => 'Sitasi berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus penelitian
     */
    public function deletePenelitian($id) {
        try {
            $this->db->delete('penelitian', ['id' => $id]);
            return ['success' => true, 'message' => 'Penelitian berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Cari penelitian
     */
    public function searchPenelitian($keyword) {
        return $this->db->fetchAll(
            "SELECT p.*, l.nama_lab FROM penelitian p 
             LEFT JOIN laboratorium l ON p.lab_id = l.id 
             WHERE p.judul_penelitian ILIKE ? OR p.abstrak ILIKE ?
             ORDER BY p.created_at DESC",
            ["%$keyword%", "%$keyword%"]
        );
    }
}
?>
