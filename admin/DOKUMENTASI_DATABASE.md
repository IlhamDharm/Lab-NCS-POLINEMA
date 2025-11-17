# Dokumentasi Koneksi Database dan Penggunaan Class

## Struktur File yang Dibuat

```
admin/
├── classes/
│   ├── Database.php          # Class utama untuk koneksi database
│   ├── Auth.php              # Class untuk autentikasi dan session
│   ├── User.php              # Class untuk mengelola user/mahasiswa
│   ├── Dosen.php             # Class untuk mengelola dosen
│   ├── Penelitian.php        # Class untuk mengelola penelitian
│   ├── Pengabdian.php        # Class untuk mengelola pengabdian masyarakat
│   ├── Laboratorium.php      # Class untuk mengelola laboratorium
│   ├── Galeri.php            # Class untuk mengelola galeri foto/video
│   ├── Agenda.php            # Class untuk mengelola agenda kegiatan
│   ├── Fasilitas.php         # Class untuk mengelola fasilitas dan peminjaman
│   ├── Konsultasi.php        # Class untuk mengelola konsultasi
│   └── Berita.php            # Class untuk mengelola berita
├── includes/
│   └── (untuk file helper lainnya)
├── login.php                 # Login dengan logika autentikasi
├── register.php              # Register dengan logika autentikasi
└── koneksi.php              # Kompatibilitas backward compatibility
```

## Cara Menggunakan Class-Class

### 1. **Koneksi Database (Database.php)**

```php
<?php
require_once __DIR__ . '/classes/Database.php';

$db = new Database();

// Query dengan parameter binding
$stmt = $db->query("SELECT * FROM mahasiswa WHERE id = ?", [1]);

// Ambil satu hasil
$user = $db->fetchOne("SELECT * FROM mahasiswa WHERE email = ?", ['user@email.com']);

// Ambil semua hasil
$users = $db->fetchAll("SELECT * FROM mahasiswa ORDER BY nama_lengkap");

// Insert
$id = $db->insert('mahasiswa', [
    'username' => 'john_doe',
    'email' => 'john@email.com',
    'password' => password_hash('password123', PASSWORD_BCRYPT),
    'nama_lengkap' => 'John Doe',
    'is_active' => true
]);

// Update
$db->update('mahasiswa', ['nama_lengkap' => 'Jane Doe'], ['id' => 1]);

// Delete
$db->delete('mahasiswa', ['id' => 1]);
?>
```

### 2. **User/Mahasiswa (User.php)**

```php
<?php
require_once __DIR__ . '/classes/User.php';

$user = new User();

// Register user baru
$result = $user->register([
    'username' => 'john_doe',
    'email' => 'john@email.com',
    'password' => 'password123',
    'nama_lengkap' => 'John Doe',
    'no_telepon' => '08123456789'
]);

// Login
$result = $user->login('john@email.com', 'password123');

// Get user by ID
$userData = $user->getUserById(1);

// Get user by email
$userData = $user->getUserByEmail('john@email.com');

// Get all users
$allUsers = $user->getAllUsers();

// Update profil
$user->updateProfile(1, [
    'nama_lengkap' => 'Jane Doe',
    'no_telepon' => '08987654321'
]);

// Change password
$result = $user->changePassword(1, 'old_password', 'new_password');

// Toggle active status
$user->toggleActive(1, false);

// Delete user
$user->deleteUser(1);
?>
```

### 3. **Autentikasi (Auth.php)**

```php
<?php
require_once __DIR__ . '/classes/Auth.php';

$auth = new Auth();

// Check apakah user sudah login
if ($auth->isLoggedIn()) {
    $currentUser = $auth->getUser();
    echo "Welcome " . $currentUser['nama_lengkap'];
}

// Require login (redirect ke login jika belum login)
$auth->requireLogin('login.php');

// Require logout (redirect ke index jika sudah login)
$auth->requireLogout('index.php');

// Logout
$auth->logout();
?>
```

### 4. **Penelitian (Penelitian.php)**

```php
<?php
require_once __DIR__ . '/classes/Penelitian.php';

$penelitian = new Penelitian();

// Tambah penelitian
$result = $penelitian->addPenelitian([
    'judul_penelitian' => 'Pengembangan Model AI',
    'abstrak' => 'Lorem ipsum...',
    'tahun' => 2024,
    'lab_id' => 1,
    'status' => 'latest',
    'file_dokumen' => 'research.pdf',
    'link_sinta' => 'https://sinta.ristekbrin.go.id/...'
]);

// Get penelitian by ID (dengan info laboratorium)
$peneliti = $penelitian->getPenelitianById(1);

// Get all penelitian
$allPenelitian = $penelitian->getAllPenelitian();

// Get latest penelitian
$latestPenelitian = $penelitian->getLatestPenelitian(10);

// Get most cited penelitian
$mostCited = $penelitian->getMostCitedPenelitian(10);

// Get penelitian by laboratorium
$labPenelitian = $penelitian->getPenelitianByLab(1);

// Get peneliti untuk penelitian tertentu
$peneliti = $penelitian->getPenelitiByPenelitian(1);

// Add peneliti to penelitian
$penelitian->addPeneliti(1, 2, 'ketua');

// Update penelitian
$penelitian->updatePenelitian(1, [
    'judul_penelitian' => 'Judul baru',
    'tahun' => 2025
]);

// Add sitasi
$penelitian->addSitasi(1, 5);

// Search penelitian
$results = $penelitian->searchPenelitian('AI');

// Delete penelitian
$penelitian->deletePenelitian(1);
?>
```

### 5. **Pengabdian Masyarakat (Pengabdian.php)**

```php
<?php
require_once __DIR__ . '/classes/Pengabdian.php';

$pengabdian = new Pengabdian();

// Add pengabdian
$result = $pengabdian->addPengabdian([
    'judul_pengabdian' => 'Pelatihan Coding untuk UMKM',
    'tahun' => 2024,
    'ketua_id' => 1,
    'prodi' => 'Teknik Informatika',
    'skema' => 'Reguler',
    'deskripsi' => 'Lorem ipsum...'
]);

// Get pengabdian by ID
$data = $pengabdian->getPengabdianById(1);

// Get all pengabdian
$allPengabdian = $pengabdian->getAllPengabdian();

// Get pengabdian by tahun
$tahunPengabdian = $pengabdian->getPengabdianByTahun(2024);

// Get pengabdian by ketua
$ketuaPengabdian = $pengabdian->getPengabdianByKetua(1);

// Get anggota pengabdian
$anggota = $pengabdian->getAnggotaPengabdian(1);

// Add anggota
$pengabdian->addAnggota(1, 2);

// Update pengabdian
$pengabdian->updatePengabdian(1, ['judul_pengabdian' => 'Judul baru']);

// Delete anggota
$pengabdian->deleteAnggota(1);

// Delete pengabdian
$pengabdian->deletePengabdian(1);

// Search pengabdian
$results = $pengabdian->searchPengabdian('Pelatihan');
?>
```

### 6. **Dosen (Dosen.php)**

```php
<?php
require_once __DIR__ . '/classes/Dosen.php';

$dosen = new Dosen();

// Add dosen
$result = $dosen->addDosen(1, [
    'nidn' => '0001234567',
    'jabatan' => 'Lektor',
    'bidang_keahlian' => 'Artificial Intelligence',
    'pendidikan_terakhir' => 'S2'
]);

// Get dosen by ID
$dosenData = $dosen->getDosenById(1);

// Get dosen by user ID
$dosenData = $dosen->getDosenByUserId(1);

// Get all dosen
$allDosen = $dosen->getAllDosen();

// Get dosen by bidang
$dosenBidang = $dosen->getDosenByBidang('AI');

// Get penelitian dosen
$penelitian = $dosen->getPenelitiDosen(1);

// Get pengabdian dosen
$pengabdian = $dosen->getPengabdianDosen(1);

// Update dosen
$dosen->updateDosen(1, ['jabatan' => 'Guru Besar']);

// Search dosen
$results = $dosen->searchDosen('Budi');

// Delete dosen
$dosen->deleteDosen(1);
?>
```

### 7. **Laboratorium (Laboratorium.php)**

```php
<?php
require_once __DIR__ . '/classes/Laboratorium.php';

$lab = new Laboratorium();

// Add laboratorium
$result = $lab->addLab([
    'nama_lab' => 'Lab AI & Machine Learning',
    'keterangan' => 'Lorem ipsum...'
]);

// Get lab by ID
$labData = $lab->getLabById(1);

// Get all lab
$allLab = $lab->getAllLab();

// Get penelitian di lab
$penelitian = $lab->getPenelitiLab(1);

// Update lab
$lab->updateLab(1, ['nama_lab' => 'Lab AI']);

// Delete lab
$lab->deleteLab(1);
?>
```

### 8. **Galeri (Galeri.php)**

```php
<?php
require_once __DIR__ . '/classes/Galeri.php';

$galeri = new Galeri();

// Add galeri
$result = $galeri->addGaleri([
    'judul' => 'Workshop AI',
    'deskripsi' => 'Lorem ipsum...',
    'jenis' => 'foto',
    'file_url' => '/img/workshop.jpg',
    'tanggal_kegiatan' => '2024-11-17',
    'kategori' => 'Kegiatan'
]);

// Get galeri by ID
$galeriData = $galeri->getGaleriById(1);

// Get all galeri
$allGaleri = $galeri->getAllGaleri();

// Get galeri by kategori
$kategoriGaleri = $galeri->getGaleriByKategori('Kegiatan');

// Get galeri by jenis
$fotoGaleri = $galeri->getGaleriByJenis('foto');

// Update galeri
$galeri->updateGaleri(1, ['judul' => 'Judul baru']);

// Delete galeri
$galeri->deleteGaleri(1);
?>
```

### 9. **Agenda Kegiatan (Agenda.php)**

```php
<?php
require_once __DIR__ . '/classes/Agenda.php';

$agenda = new Agenda();

// Add agenda
$result = $agenda->addAgenda([
    'judul_kegiatan' => 'Workshop Python',
    'deskripsi' => 'Lorem ipsum...',
    'tanggal' => '2024-12-01',
    'waktu' => '09:00:00',
    'lokasi' => 'Gedung A',
    'status' => 'akan_datang'
]);

// Get agenda by ID
$agendaData = $agenda->getAgendaById(1);

// Get all agenda
$allAgenda = $agenda->getAllAgenda();

// Get upcoming agenda
$upcomingAgenda = $agenda->getUpcomingAgenda(10);

// Get agenda by status
$agendaSelesai = $agenda->getAgendaByStatus('selesai');

// Update agenda
$agenda->updateAgenda(1, ['status' => 'selesai']);

// Delete agenda
$agenda->deleteAgenda(1);
?>
```

### 10. **Fasilitas (Fasilitas.php)**

```php
<?php
require_once __DIR__ . '/classes/Fasilitas.php';

$fasilitas = new Fasilitas();

// Add fasilitas
$result = $fasilitas->addFasilitas([
    'nama_fasilitas' => 'Laboratorium Komputer',
    'jenis' => 'laboratorium',
    'deskripsi' => 'Lab untuk praktikum',
    'kapasitas' => 40,
    'status' => 'tersedia'
]);

// Get fasilitas by ID
$fasilitasData = $fasilitas->getFasilitasById(1);

// Get all fasilitas
$allFasilitas = $fasilitas->getAllFasilitas();

// Get fasilitas by jenis
$labFasilitas = $fasilitas->getFasilitasByJenis('laboratorium');

// Get fasilitas tersedia
$tersediaFasilitas = $fasilitas->getFasilitasTersedia();

// Update fasilitas
$fasilitas->updateFasilitas(1, ['status' => 'maintenance']);

// PEMINJAMAN FASILITAS
// Add peminjaman
$result = $fasilitas->addPeminjaman([
    'user_id' => 1,
    'fasilitas_id' => 1,
    'tanggal_peminjaman' => '2024-11-20',
    'waktu_peminjaman' => '08:00:00',
    'jumlah_peserta' => 20,
    'keperluan' => 'Praktikum Database'
]);

// Get peminjaman by ID
$peminjamanData = $fasilitas->getPeminjamanById(1);

// Get all peminjaman
$allPeminjaman = $fasilitas->getAllPeminjaman();

// Get peminjaman by user
$userPeminjaman = $fasilitas->getPeminjamanByUser(1);

// Get peminjaman by status
$pendingPeminjaman = $fasilitas->getPeminjamanByStatus('pending');

// Update peminjaman
$fasilitas->updatePeminjaman(1, ['status' => 'disetujui']);

// Delete peminjaman
$fasilitas->deletePeminjaman(1);

// Delete fasilitas
$fasilitas->deleteFasilitas(1);
?>
```

### 11. **Konsultasi (Konsultasi.php)**

```php
<?php
require_once __DIR__ . '/classes/Konsultasi.php';

$konsultasi = new Konsultasi();

// Add konsultasi
$result = $konsultasi->addKonsultasi([
    'user_id' => 1,
    'jenis_konsultasi' => 'akademik',
    'metode' => 'tatap_muka',
    'tanggal_konsultasi' => '2024-11-20',
    'waktu_konsultasi' => '14:00:00',
    'topik_permasalahan' => 'Masalah dengan projek akhir'
]);

// Get konsultasi by ID
$konsultasiData = $konsultasi->getKonsultasiById(1);

// Get all konsultasi
$allKonsultasi = $konsultasi->getAllKonsultasi();

// Get konsultasi by user
$userKonsultasi = $konsultasi->getKonsultasiByUser(1);

// Get konsultasi by jenis
$akademikKonsultasi = $konsultasi->getKonsultasiByJenis('akademik');

// Get konsultasi by status
$pendingKonsultasi = $konsultasi->getKonsultasiByStatus('pending');

// Get konsultasi by tanggal
$hariiniKonsultasi = $konsultasi->getKonsultasiByTanggal('2024-11-20');

// Update konsultasi
$konsultasi->updateKonsultasi(1, ['status' => 'dikonfirmasi']);

// Delete konsultasi
$konsultasi->deleteKonsultasi(1);
?>
```

### 12. **Berita (Berita.php)**

```php
<?php
require_once __DIR__ . '/classes/Berita.php';

$berita = new Berita();

// Add berita
$result = $berita->addBerita([
    'judul_berita' => 'Peluncuran Program Baru',
    'isi_berita' => 'Lorem ipsum...',
    'penulis_id' => 1,
    'kategori' => 'Pengumuman',
    'is_published' => false
]);

// Get berita by ID
$beritaData = $berita->getBeritaById(1);

// Get all berita
$allBerita = $berita->getAllBerita();

// Get berita yang dipublikasikan
$publishedBerita = $berita->getBeritaPublished(10);

// Get berita by kategori
$kategoriBerita = $berita->getBeritaByKategori('Pengumuman');

// Get berita by penulis
$penuliBerita = $berita->getBeritaByPenulis(1);

// Get latest berita
$latestBerita = $berita->getLatestBerita(5);

// Search berita
$results = $berita->searchBerita('Program');

// Update berita
$berita->updateBerita(1, ['judul_berita' => 'Judul baru']);

// Publish berita
$berita->publishBerita(1);

// Unpublish berita
$berita->unpublishBerita(1);

// Delete berita
$berita->deleteBerita(1);
?>
```

## Contoh Implementasi di File PHP Existing

Untuk file seperti `penelitian.php`, `pengabdian.php`, dll., tambahkan di bagian paling atas setelah `<?php`:

```php
<?php
// Sertakan file header dan sidebar seperti biasa
include 'header.php';
include 'sidebar.php';

// Tambahkan autentikasi dan koneksi database
require_once __DIR__ . '/classes/Auth.php';
require_once __DIR__ . '/classes/Penelitian.php';

$auth = new Auth();
$auth->requireLogin('login.php');

$penelitian = new Penelitian();

// Ambil data dari database
$allPenelitian = $penelitian->getAllPenelitian();

// Gunakan $allPenelitian dalam loop untuk menampilkan data
?>

<!-- HTML dan tampilan seperti biasa -->
<table>
    <tbody>
        <?php foreach ($allPenelitian as $index => $item): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($item['judul_penelitian']); ?></td>
                <td><?php echo htmlspecialchars($item['tahun']); ?></td>
                <!-- More columns -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
```

## Testing Koneksi

Buat file `test_koneksi.php` di folder admin untuk test koneksi:

```php
<?php
require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/User.php';

try {
    $db = new Database();
    echo "✓ Koneksi Database Berhasil<br>";
    
    $user = new User();
    $allUsers = $user->getAllUsers();
    echo "✓ Query Berhasil, Total Users: " . count($allUsers) . "<br>";
    
    echo "<h3>Daftar Users:</h3>";
    foreach ($allUsers as $u) {
        echo "- " . $u['nama_lengkap'] . " (" . $u['email'] . ")<br>";
    }
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage();
}
?>
```

## Keamanan

1. Password selalu di-hash menggunakan `password_hash()` dan `password_verify()`
2. Semua query menggunakan parameter binding untuk mencegah SQL Injection
3. Input di-sanitasi dengan `htmlspecialchars()` saat ditampilkan
4. Session digunakan untuk menyimpan data user yang login

Semua class sudah siap digunakan! 🚀
