<?php
/**
 * Agenda Class
 * Mengelola data agenda kegiatan
 */

require_once __DIR__ . '/Database.php';

class Agenda {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Menambah agenda baru
     */
    public function addAgenda($data) {
        try {
            $id = $this->db->insert('agenda_kegiatan', $data);
            return ['success' => true, 'id' => $id, 'message' => 'Agenda berhasil ditambahkan'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Mendapatkan agenda berdasarkan ID
     */
    public function getAgendaById($id) {
        return $this->db->fetchOne("SELECT * FROM agenda_kegiatan WHERE id = ?", [$id]);
    }

    /**
     * Mendapatkan semua agenda
     */
    public function getAllAgenda($sort = 'tanggal DESC') {
        return $this->db->fetchAll("SELECT * FROM agenda_kegiatan ORDER BY " . $sort);
    }

    /**
     * Mendapatkan agenda yang akan datang
     */
    public function getUpcomingAgenda($limit = 10) {
        return $this->db->fetchAll(
            "SELECT * FROM agenda_kegiatan WHERE status = 'akan_datang' AND tanggal >= CURRENT_DATE 
             ORDER BY tanggal ASC LIMIT ?",
            [$limit]
        );
    }

    /**
     * Mendapatkan agenda berdasarkan status
     */
    public function getAgendaByStatus($status) {
        return $this->db->fetchAll(
            "SELECT * FROM agenda_kegiatan WHERE status = ? ORDER BY tanggal DESC",
            [$status]
        );
    }

    /**
     * Update agenda
     */
    public function updateAgenda($id, $data) {
        try {
            $this->db->update('agenda_kegiatan', $data, ['id' => $id]);
            return ['success' => true, 'message' => 'Agenda berhasil diupdate'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Hapus agenda
     */
    public function deleteAgenda($id) {
        try {
            $this->db->delete('agenda_kegiatan', ['id' => $id]);
            return ['success' => true, 'message' => 'Agenda berhasil dihapus'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
