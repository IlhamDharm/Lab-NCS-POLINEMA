<?php
/**
 * TEMPLATE FILE UNTUK UPDATE PENELITIAN.PHP
 * 
 * Instruksi:
 * 1. Copy bagian PHP di bawah ke bagian paling atas file penelitian.php
 * 2. Ganti data hardcoded di table dengan loop foreach
 * 3. Test di browser
 */
?>

<!-- BAGIAN 1: COPY KODE PHP INI KE ATAS FILE PENELITIAN.PHP -->
<?php
// Pastikan include header & sidebar sudah ada di atas
// include 'header.php';
// include 'sidebar.php';

// TAMBAHKAN BAGIAN INI:
require_once __DIR__ . '/classes/Auth.php';
require_once __DIR__ . '/classes/Penelitian.php';

// Proteksi halaman - user harus login
$auth = new Auth();
$auth->requireLogin('login.php');

// Inisialisasi class Penelitian
$penelitian = new Penelitian();

// Ambil semua data penelitian dari database
$allPenelitian = $penelitian->getAllPenelitian();

// Inisialisasi untuk delete/edit jika ada request POST
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'delete') {
        $id = $_POST['id'] ?? 0;
        $result = $penelitian->deletePenelitian($id);
        if ($result) {
            $success = 'Penelitian berhasil dihapus!';
            // Refresh data
            $allPenelitian = $penelitian->getAllPenelitian();
        } else {
            $error = 'Gagal menghapus penelitian!';
        }
    }
}
?>

<!-- BAGIAN 2: GANTI HARDCODED DATA DI TABLE DENGAN KODE INI -->
<!-- 
Cari section <table> di file penelitian.php dan ganti <tbody> dengan:
-->
<tbody>
    <?php if (empty($allPenelitian)): ?>
        <tr>
            <td colspan="6" class="text-center text-muted">
                Belum ada data penelitian. 
                <a href="penelitian-tambah.php">Tambah sekarang</a>
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($allPenelitian as $index => $item): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td>
                    <strong><?php echo htmlspecialchars($item['judul_penelitian']); ?></strong><br>
                    <small class="text-muted">Lab: <?php echo htmlspecialchars($item['nama_lab'] ?? '-'); ?></small>
                </td>
                <td>
                    <?php 
                    // Get peneliti untuk penelitian ini
                    $peneliti = $penelitian->getPenelitiByPenelitian($item['id']);
                    if (count($peneliti) > 0) {
                        foreach (array_slice($peneliti, 0, 2) as $p) {
                            echo htmlspecialchars($p['nama_lengkap']) . "<br>";
                        }
                        if (count($peneliti) > 2) {
                            echo "+(" . (count($peneliti) - 2) . ") lainnya";
                        }
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
                <td><?php echo $item['tahun']; ?></td>
                <td>
                    <?php if (!empty($item['file_dokumen'])): ?>
                        <a href="<?php echo htmlspecialchars($item['file_dokumen']); ?>" 
                           class="btn btn-sm btn-outline-primary" target="_blank">
                            Download PDF
                        </a>
                    <?php else: ?>
                        <span class="text-muted">-</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="penelitian-edit.php?id=<?php echo $item['id']; ?>" 
                           class="btn btn-outline-info" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-outline-danger" 
                                onclick="confirmDelete(<?php echo $item['id']; ?>, '<?php echo htmlspecialchars($item['judul_penelitian'], ENT_QUOTES); ?>')"
                                title="Hapus">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>

<!-- BAGIAN 3: TAMBAHKAN JAVASCRIPT INI DI AKHIR FILE SEBELUM </body> -->
<script>
function confirmDelete(id, judul) {
    if (confirm('Apakah Anda yakin ingin menghapus penelitian: ' + judul + '?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.innerHTML = `
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="${id}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<!-- BAGIAN 4: TAMPILKAN ERROR/SUCCESS MESSAGES -->
<!-- Letakkan bagian ini di atas <table> -->
<?php if (!empty($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo htmlspecialchars($error); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> <?php echo htmlspecialchars($success); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<!-- ============================================================================ -->

<!-- CARA MELAKUKAN HAL YANG SAMA UNTUK FILE LAIN:

1. PENGABDIAN.PHP
   - Ganti require class menjadi require_once __DIR__ . '/classes/Pengabdian.php';
   - $pengabdian = new Pengabdian();
   - $allPengabdian = $pengabdian->getAllPengabdian();

2. PENGELOLA.PHP (DOSEN)
   - require_once __DIR__ . '/classes/Dosen.php';
   - $dosen = new Dosen();
   - $allDosen = $dosen->getAllDosen();

3. GALERI.PHP
   - require_once __DIR__ . '/classes/Galeri.php';
   - $galeri = new Galeri();
   - $allGaleri = $galeri->getAllGaleri();

4. DAN SETERUSNYA UNTUK FILE LAIN...

POLA YANG SAMA UNTUK SEMUA FILE!
-->
