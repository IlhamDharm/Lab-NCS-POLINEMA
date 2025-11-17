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
                <div class="page-header-icon"><i data-feather="edit"></i></div>
                <span>Edit Sejarah</span>
            </h1>
            <div class="page-header-subtitle">Ubah konten halaman sejarah</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card mb-4">
                <div class="card-header">Formulir Edit Sejarah</div>
                <div class="card-body">
                    
                    <form action="" method="POST">
                        
                        <div class="form-group">
                            <label for="isiSejarah">Konten Halaman Sejarah</label>
                            <textarea class="form-control" id="isiSejarah" name="isiSejarah" rows="15">
Ini adalah konten dummy untuk halaman sejarah. 

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
euismod,
lectus ac varius convallis, erat lacus maximus justo, nec
condimentum
nisl sem vitae magna. 

Proin sed sapien vel eros tincidunt finibus. 
Nullam tincidunt,
nisi eu aliquet faucibus, justo risus finibus nisl, sit amet
elementum
augue eros ut dui. 
Curabitur sit amet feugiat turpis.
                            </textarea>
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        
                        <a href="sejarah.php" class="btn btn-light">Batal</a>
                        
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>

</div>

<?php 
// Sertakan file footer, ini berisi penutup </body>, </html>, dan <script>
include 'footer.php'; 
?>