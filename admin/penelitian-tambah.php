<?php 
// Sertakan file header, ini berisi <head> dan navigasi atas
include 'header.php'; 
?>

<?php 
// Sertakan file sidebar, ini berisi menu navigasi samping
include 'sidebar.php'; 
?>

<?php
require_once __DIR__ . '/classes/Penelitian.php';
require_once __DIR__ . '/classes/Database.php';

$penelitianObj = new Penelitian();
// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judulPenelitian'] ?? '');
    $tahun = (int) ($_POST['tahun'] ?? 0);
    // basic validation
    $errors = [];
    if ($judul === '') $errors[] = 'Judul penelitian wajib diisi.';
    if ($tahun < 1900 || $tahun > 2099) $errors[] = 'Tahun tidak valid.';

    $fileName = '';
    if (!empty($_FILES['filePDF']['name'])) {
        $uploadDir = __DIR__ . '/../files/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $ext = strtolower(pathinfo($_FILES['filePDF']['name'], PATHINFO_EXTENSION));
        if ($ext !== 'pdf') $errors[] = 'File harus berekstensi .pdf';
        if ($_FILES['filePDF']['size'] > 5 * 1024 * 1024) $errors[] = 'Ukuran file maksimal 5MB.';
        if (empty($errors)) {
            $fileName = uniqid('pen_') . '.' . $ext;
            $dest = $uploadDir . $fileName;
            if (!move_uploaded_file($_FILES['filePDF']['tmp_name'], $dest)) {
                $errors[] = 'Gagal mengunggah file.';
            }
        }
    }

    if (empty($errors)) {
        $data = [
            'judul_penelitian' => $judul,
            'abstrak' => $_POST['abstrak'] ?? '',
            'tahun' => $tahun,
            'lab_id' => 1,
            'status' => 'latest',
            'file_dokumen' => $fileName,
            'link_sinta' => ''
        ];

        $res = $penelitianObj->addPenelitian($data);
        if ($res['success']) {
            header('Location: penelitian.php?msg=' . urlencode('Penelitian berhasil ditambahkan.'));
            exit;
        } else {
            $errors[] = $res['message'] ?? 'Gagal menyimpan data.';
        }
    }
}
?>

<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="plus-square"></i></div>
                <span>Tambah Penelitian Baru</span>
            </h1>
            <div class="page-header-subtitle">Menambahkan data penelitian baru ke sistem</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="card mb-4">
        <div class="card-header">Formulir Penelitian Baru</div>
        <div class="card-body">
            
            <form action="" method="POST" enctype="multipart/form-data">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php foreach ($errors as $err): ?><li><?php echo htmlspecialchars($err); ?></li><?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="judulPenelitian">Judul Penelitian</label>
                    <input class="form-control" id="judulPenelitian" name="judulPenelitian" type="text" placeholder="Masukkan judul penelitian...">
                </div>
                
                <div class="form-group">
                    <label for="peneliti">Peneliti</label>
                    <input class="form-control" id="peneliti" name="peneliti" type="text" placeholder="Nama peneliti (Contoh: Dr. Budi Santoso, M.Kom.)">
                </div>
                
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input class="form-control" id="tahun" name="tahun" type="number" min="1990" max="2099" placeholder="YYYY (Contoh: 2024)">
                </div>
                
                <div class="form-group">
                    <label for="filePDF">Upload File PDF</label>
                    <input class="form-control-file" id="filePDF" name="filePDF" type="file" accept=".pdf">
                    <small class="form-text text-muted">Hanya file .pdf yang diperbolehkan. Ukuran maksimal 5MB.</small>
                </div>
                
                <hr class="my-4">
                
                <button class="btn btn-primary" type="submit">Simpan</button>
                
                <a href="penelitian.php" class="btn btn-light">Batal</a>
                
            </form>
            
        </div>
    </div>

</div>

<?php 
// Sertakan file footer, ini berisi penutup </body>, </html>, dan <script>
include 'footer.php'; 
?>