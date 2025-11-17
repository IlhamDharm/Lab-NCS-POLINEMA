<?php 
// Sertakan file header, ini berisi <head> dan navigasi atas
include 'header.php'; 
?>

<?php 
// Sertakan file sidebar, ini berisi menu navigasi samping
include 'sidebar.php'; 
?>

<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="plus-square"></i></div>
                <span>Tambah Pengabdian Baru</span>
            </h1>
            <div class="page-header-subtitle">Menambahkan data pengabdian baru ke sistem</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="card mb-4">
        <div class="card-header">Formulir Pengabdian Baru</div>
        <div class="card-body">
            
            <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="judul">Judul Pengabdian</label>
                    <input class="form-control" id="judul" name="judul" type="text" placeholder="Masukkan judul pengabdian...">
                </div>
                
                <div class="form-group">
                    <label for="pengabdi">Pengabdi</label>
                    <input class="form-control" id="pengabdi" name="pengabdi" type="text" placeholder="Nama pengabdi (Contoh: Tim Dosen Teknik)">
                </div>
                
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input class="form-control" id="tahun" name="tahun" type="number" min="1990" max="2099" placeholder="YYYY (Contoh: 2024)">
                </div>
                
                <div class="form-group">
                    <label for="file_pdf">Upload File PDF</label>
                    <input class="form-control-file" id="file_pdf" name="file_pdf" type="file" accept=".pdf">
                    <small class="form-text text-muted">Hanya file .pdf yang diperbolehkan. Ukuran maksimal 5MB.</small>
                </div>
                
                <hr class="my-4">
                
                <button class="btn btn-primary" type="submit">Simpan</button>
                
                <a href="pengabdian.php" class="btn btn-light">Batal</a>
                
            </form>
            
        </div>
    </div>

</div>

<?php 
// Sertakan file footer, ini berisi penutup </body>, </html>, dan <script>
include 'footer.php'; 
?>