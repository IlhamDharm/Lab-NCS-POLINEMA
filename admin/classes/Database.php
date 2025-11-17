<?php
/**
 * Database Connection Class
 * Mengelola koneksi ke database PostgreSQL
 */

class Database {
    private $host = '127.0.0.1';
    private $dbname = 'PBL';
    private $user = 'postgres';
    private $password = '12345678';
    private $port = '5433';
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    /**
     * Membuat koneksi ke database
     */
    public function connect() {
        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname};sslmode=disable";
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi Database Gagal: " . $e->getMessage());
        }
    }

    /**
     * Mendapatkan instance PDO
     */
    public function getPdo() {
        return $this->pdo;
    }

    /**
     * Menjalankan query dengan parameter binding
     */
    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query Error: " . $e->getMessage());
        }
    }

    /**
     * Mengambil satu baris hasil query
     */
    public function fetchOne($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Mengambil semua baris hasil query
     */
    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Insert data
     */
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        
        $stmt = $this->query($sql, array_values($data));
        return $this->pdo->lastInsertId();
    }

    /**
     * Update data
     */
    public function update($table, $data, $where) {
        $set = implode(', ', array_map(fn($key) => "$key = ?", array_keys($data)));
        $whereClause = implode(' AND ', array_map(fn($key) => "$key = ?", array_keys($where)));
        $sql = "UPDATE $table SET $set WHERE $whereClause";
        
        $params = array_merge(array_values($data), array_values($where));
        return $this->query($sql, $params);
    }

    /**
     * Delete data
     */
    public function delete($table, $where) {
        $whereClause = implode(' AND ', array_map(fn($key) => "$key = ?", array_keys($where)));
        $sql = "DELETE FROM $table WHERE $whereClause";
        
        return $this->query($sql, array_values($where));
    }

    /**
     * Menutup koneksi
     */
    public function close() {
        $this->pdo = null;
    }
}
?>
