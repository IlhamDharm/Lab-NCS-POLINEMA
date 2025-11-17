<?php
/**
 * Berita Class
 * Mengelola data berita
 */

require_once __DIR__ . '/Database.php';

class Berita {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah berita baru
     */
    public function addBerita($data) {
        try {
            $id = $this->db->insert('berita', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Berita berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan berita berdasarkan ID
     */
    public function getBeritaById($id) {
        return $this->db->fetchOne(
            "SELECT b.*, m.nama_lengkap as penulis FROM berita b
             LEFT JOIN mahasiswa m ON b.penulis_id = m.id
             WHERE b.id = ?",
            [$id]
        );
    }

    /**
     * Mendapatkan semua berita
     */
    public function getAllBerita($sort = 'created_at DESC', $limit = null) {
        $sql = "SELECT b.*, m.nama_lengkap as penulis FROM berita b
                LEFT JOIN mahasiswa m ON b.penulis_id = m.id
                ORDER BY " . $sort;
        
        if ($limit) $sql .= " LIMIT " . $limit;
        
        return $this->db->fetchAll($sql);
    }

    /**
     * Mendapatkan berita yang dipublikasikan
     */
    public function getBeritaPublished($limit = null) {
        $sql = "SELECT b.*, m.nama_lengkap as penulis FROM berita b
                LEFT JOIN mahasiswa m ON b.penulis_id = m.id
                WHERE b.is_published = TRUE
                ORDER BY b.created_at DESC";
        
        if ($limit) $sql .= " LIMIT " . $limit;
        
        return $this->db->fetchAll($sql);
    }

    /**
     * Mendapatkan berita berdasarkan kategori
     */
    public function getBeritaByKategori($kategori, $published_only = true) {
        $sql = "SELECT b.*, m.nama_lengkap as penulis FROM berita b
                LEFT JOIN mahasiswa m ON b.penulis_id = m.id
                WHERE b.kategori = ?";
        
        if ($published_only) {
            $sql .= " AND b.is_published = TRUE";
        }
        
        $sql .= " ORDER BY b.created_at DESC";
        
        return $this->db->fetchAll($sql, [$kategori]);
    }

    /**
     * Mendapatkan berita oleh penulis
     */
    public function getBeritaByPenulis($penulis_id) {
        return $this->db->fetchAll(
            "SELECT b.* FROM berita b
             WHERE b.penulis_id = ?
             ORDER BY b.created_at DESC",
            [$penulis_id]
        );
    }

    /**
     * Mendapatkan berita terbaru
     */
    public function getLatestBerita($limit = 5) {
        return $this->getBeritaPublished($limit);
    }

    /**
     * Cari berita
     */
    public function searchBerita($keyword, $published_only = true) {
        $sql = "SELECT b.*, m.nama_lengkap as penulis FROM berita b
                LEFT JOIN mahasiswa m ON b.penulis_id = m.id
                WHERE (b.judul_berita ILIKE ? OR b.isi_berita ILIKE ? OR b.kategori ILIKE ?)";
        
        if ($published_only) {
            $sql .= " AND b.is_published = TRUE";
        }
        
        $sql .= " ORDER BY b.created_at DESC";
        
        return $this->db->fetchAll($sql, ["%$keyword%", "%$keyword%", "%$keyword%"]);
    }

    /**
     * Update berita
     */
    public function updateBerita($id, $data) {
        try {
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->update('berita', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Berita berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Publish berita
     */
    public function publishBerita($id) {
        try {
            $this->db->update('berita', ['is_published' => true], ['id' => $id]);
            return ['success' => true, 'message' => 'Berita berhasil dipublikasikan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Unpublish berita
     */
    public function unpublishBerita($id) {
        try {
            $this->db->update('berita', ['is_published' => false], ['id' => $id]);
            return ['success' => true, 'message' => 'Berita berhasil disembunyikan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus berita
     */
    public function deleteBerita($id) {
        try {
            $this->db->delete('berita', ['id' => $id]);
            return ['success' => true, 'message' => 'Berita berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
