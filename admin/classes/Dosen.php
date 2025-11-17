<?php
/**
 * Dosen Class
 * Mengelola data dosen
 */

require_once __DIR__ . '/Database.php';

class Dosen {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah dosen baru
     */
    public function addDosen($user_id, $data) {
        try {
            $data['user_id'] = $user_id;
            $id = $this->db->insert('dosen', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Dosen berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan dosen berdasarkan ID
     */
    public function getDosenById($id) {
        return $this->db->fetchOne(
            "SELECT d.*, m.nama_lengkap, m.email, m.no_telepon, m.foto_profil FROM dosen d 
             LEFT JOIN mahasiswa m ON d.user_id = m.id 
             WHERE d.id = ?",
            [$id]
        );
    }

    /**
     * Mendapatkan dosen berdasarkan user_id
     */
    public function getDosenByUserId($user_id) {
        return $this->db->fetchOne(
            "SELECT d.*, m.nama_lengkap, m.email, m.no_telepon, m.foto_profil FROM dosen d 
             LEFT JOIN mahasiswa m ON d.user_id = m.id 
             WHERE d.user_id = ?",
            [$user_id]
        );
    }

    /**
     * Mendapatkan semua dosen
     */
    public function getAllDosen($sort = 'nama_lengkap ASC') {
        return $this->db->fetchAll(
            "SELECT d.*, m.nama_lengkap, m.email, m.no_telepon, m.foto_profil, m.nim_nip FROM dosen d 
             LEFT JOIN mahasiswa m ON d.user_id = m.id 
             ORDER BY m." . $sort
        );
    }

    /**
     * Mendapatkan dosen berdasarkan bidang keahlian
     */
    public function getDosenByBidang($bidang) {
        return $this->db->fetchAll(
            "SELECT d.*, m.nama_lengkap, m.email, m.no_telepon, m.foto_profil FROM dosen d 
             LEFT JOIN mahasiswa m ON d.user_id = m.id 
             WHERE d.bidang_keahlian ILIKE ?
             ORDER BY m.nama_lengkap",
            ["%$bidang%"]
        );
    }

    /**
     * Mendapatkan penelitian dosen
     */
    public function getPenelitiDosen($dosen_id) {
        return $this->db->fetchAll(
            "SELECT p.*, l.nama_lab FROM peneliti_penelitian pp
             JOIN penelitian p ON pp.penelitian_id = p.id
             LEFT JOIN laboratorium l ON p.lab_id = l.id
             WHERE pp.dosen_id = ?
             ORDER BY p.created_at DESC",
            [$dosen_id]
        );
    }

    /**
     * Mendapatkan pengabdian dosen
     */
    public function getPengabdianDosen($dosen_id) {
        return $this->db->fetchAll(
            "SELECT pm.* FROM anggota_pengabdian ap
             JOIN pengabdian_masyarakat pm ON ap.pengabdian_id = pm.id
             WHERE ap.dosen_id = ?
             ORDER BY pm.created_at DESC",
            [$dosen_id]
        );
    }

    /**
     * Update profil dosen
     */
    public function updateDosen($id, $data) {
        try {
            $this->db->update('dosen', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Profil dosen berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus dosen
     */
    public function deleteDosen($id) {
        try {
            $this->db->delete('dosen', ['id' => $id]);
            return ['success' => true, 'message' => 'Dosen berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Cari dosen
     */
    public function searchDosen($keyword) {
        return $this->db->fetchAll(
            "SELECT d.*, m.nama_lengkap, m.email, m.no_telepon, m.foto_profil FROM dosen d 
             LEFT JOIN mahasiswa m ON d.user_id = m.id 
             WHERE m.nama_lengkap ILIKE ? OR m.email ILIKE ? OR d.bidang_keahlian ILIKE ?
             ORDER BY m.nama_lengkap",
            ["%$keyword%", "%$keyword%", "%$keyword%"]
        );
    }
}
?>
