<?php
/**
 * Test Koneksi Database - Simple Version
 * Jalankan dari command line: php test_simple.php
 */

echo "╔════════════════════════════════════════════════════════╗\n";
echo "║        TEST KONEKSI DATABASE PostgreSQL                ║\n";
echo "╚════════════════════════════════════════════════════════╝\n\n";

// Test 1: PDO PostgreSQL
echo "TEST 1: PDO PostgreSQL Extension\n";
echo "─────────────────────────────────────────────────────────\n";

try {
    $pdo = new PDO(
        "pgsql:host=localhost;port=5433;dbname=PBL",
        "postgres",
        "1234568"
    );
    
    echo "✓ BERHASIL: Koneksi ke database PBL\n";
    echo "  Host: localhost:5433\n";
    echo "  Database: PBL\n";
    echo "  User: postgres\n\n";
    
    // Test 2: Query
    echo "TEST 2: Execute Query\n";
    echo "─────────────────────────────────────────────────────────\n";
    
    $stmt = $pdo->query("SELECT version()");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "✓ BERHASIL: Query executed\n";
    echo "  PostgreSQL Version: " . substr($result['version'], 0, 50) . "...\n\n";
    
    // Test 3: Check tables
    echo "TEST 3: Check Tables\n";
    echo "─────────────────────────────────────────────────────────\n";
    
    $stmt = $pdo->query("
        SELECT table_name 
        FROM information_schema.tables 
        WHERE table_schema = 'public'
        ORDER BY table_name
    ");
    
    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($tables) > 0) {
        echo "✓ BERHASIL: Ditemukan " . count($tables) . " tabel\n\n";
        echo "Daftar Tabel:\n";
        foreach ($tables as $index => $table) {
            echo "  " . ($index + 1) . ". " . $table['table_name'] . "\n";
        }
        echo "\n";
    } else {
        echo "⚠ WARNING: Tidak ada tabel di database\n";
        echo "  Pastikan struktur database sudah dibuat\n\n";
    }
    
    // Test 4: Database Class
    echo "TEST 4: Database Class\n";
    echo "─────────────────────────────────────────────────────────\n";
    
    require_once __DIR__ . '/classes/Database.php';
    $db = new Database();
    $pdo2 = $db->getPdo();
    
    echo "✓ BERHASIL: Database class instantiated\n";
    echo "  PDO Connection: " . ($pdo2 ? "Active" : "Failed") . "\n\n";
    
    // Test 5: User Class
    echo "TEST 5: User Class\n";
    echo "─────────────────────────────────────────────────────────\n";
    
    require_once __DIR__ . '/classes/User.php';
    $user = new User();
    $allUsers = $user->getAllUsers();
    
    echo "✓ BERHASIL: User class working\n";
    echo "  Total Users: " . count($allUsers) . "\n";
    
    if (count($allUsers) > 0) {
        echo "\n  Contoh User:\n";
        foreach (array_slice($allUsers, 0, 3) as $u) {
            echo "    - " . $u['nama_lengkap'] . " (" . $u['email'] . ")\n";
        }
    }
    
    echo "\n\n";
    echo "╔════════════════════════════════════════════════════════╗\n";
    echo "║  ✓ SEMUA TEST BERHASIL! KONEKSI DATABASE OK!          ║\n";
    echo "╚════════════════════════════════════════════════════════╝\n";
    
    echo "\nLangkah Selanjutnya:\n";
    echo "1. Database connection sudah berfungsi\n";
    echo "2. Mulai update file-file admin Anda dengan class-class\n";
    echo "3. Baca dokumentasi di DOKUMENTASI_DATABASE.md\n";
    echo "4. Ikuti template di TEMPLATE_UPDATE_FILE.php\n";
    
} catch (PDOException $e) {
    echo "✗ GAGAL: " . $e->getMessage() . "\n\n";
    echo "Kemungkinan Penyebab:\n";
    echo "1. PostgreSQL server tidak running\n";
    echo "2. Kredensial database salah\n";
    echo "3. Database 'PBL' belum dibuat\n";
    echo "4. Extension pdo_pgsql tidak enabled\n";
    echo "\nSolusi:\n";
    echo "- Pastikan PostgreSQL running di port 5433\n";
    echo "- Cek kredensial di classes/Database.php\n";
    echo "- Buat database PBL jika belum ada\n";
    echo "- Enable extension pdo_pgsql di php.ini\n";
    exit(1);
} catch (Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . "\n";
    exit(1);
}
?>
