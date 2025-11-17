<?php
// Sertakan file header, ini berisi <head> dan navigasi atas
include 'header.php';
?>

<?php
// Sertakan file sidebar, ini berisi menu navigasi samping
include 'sidebar.php';
?>

<?php
// CRUD handling and data loading
require_once __DIR__ . '/classes/Penelitian.php';
require_once __DIR__ . '/classes/Database.php';

$penelitianObj = new Penelitian();

// Handle delete request (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_penelitian_id'])) {
    $delId = (int) $_POST['delete_penelitian_id'];
    // try get penelitian to remove file
    $row = $penelitianObj->getPenelitianById($delId);
    if ($row) {
        // remove file if exists
        if (!empty($row['file_dokumen'])) {
            $filePath = __DIR__ . '/../files/' . basename($row['file_dokumen']);
            if (file_exists($filePath)) @unlink($filePath);
        }
        $penelitianObj->deletePenelitian($delId);
        header('Location: penelitian.php?msg=' . urlencode('Penelitian berhasil dihapus.'));
        exit;
    } else {
        header('Location: penelitian.php?msg=' . urlencode('Data tidak ditemukan.'));
        exit;
    }
}

$allPenelitian = $penelitianObj->getAllPenelitian('p.created_at DESC');
?>

<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="search"></i></div>
                <span>Penelitian</span>
            </h1>
            <div class="page-header-subtitle">Mengelola data penelitian dan publikasi</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Penelitian</span>
            <a href="penelitian-tambah.php" class="btn btn-primary btn-sm">Tambah Penelitian Baru</a>
        </div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th>Judul Penelitian</th>
                            <th>Peneliti</th>
                            <th>Tahun</th>
                            <th style="width: 150px;">File PDF</th>
                            <th style="width: 60px;">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    if (!empty($_GET['msg'])) {
                        echo '<tr><td colspan="6"><div class="alert alert-success">' . htmlspecialchars($_GET['msg']) . '</div></td></tr>';
                    }
                    foreach ($allPenelitian as $p) {
                        $fileUrl = !empty($p['file_dokumen']) ? 'files/' . basename($p['file_dokumen']) : '';
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . htmlspecialchars($p['judul_penelitian']) . '</td>';
                        // attempt to show peneliti name if available
                        $penelitiName = $p['nama_lab'] ?? '-';
                        echo '<td>' . htmlspecialchars($penelitiName) . '</td>';
                        echo '<td>' . htmlspecialchars($p['tahun']) . '</td>';
                        echo '<td>';
                        if ($fileUrl) {
                            echo '<a href="' . htmlspecialchars($fileUrl) . '" class="btn btn-sm btn-info" target="_blank" title="Download PDF">';
                            echo '<i data-feather="download" class="mr-1" style="width:1rem; height:1rem;"></i> Download';
                            echo '</a>';
                        } else {
                            echo '<span class="text-muted">-</span>';
                        }
                        echo '</td>';
                        echo '<td>';
                        echo '<form method="POST" style="display:inline" onsubmit="return confirm(\'Hapus data penelitian ini?\')">';
                        echo '<input type="hidden" name="delete_penelitian_id" value="' . (int)$p['id'] . '">';
                        echo '<button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php
// Sertakan file footer, ini berisi penutup </body>, </html>, dan <script>
include 'footer.php';
?>