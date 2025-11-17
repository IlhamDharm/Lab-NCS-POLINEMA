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
                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                <span>Tambah Pengelola Baru</span>
            </h1>
            <div class="page-header-subtitle">Menambahkan pengguna baru ke sistem</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="card mb-4">
        <div class="card-header">Formulir Pengelola Baru</div>
        <div class="card-body">
            
            <form action="" method="POST">
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" name="username" type="text" placeholder="Masukkan username..." required>
                </div>
                
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan nama lengkap..." required>
                </div>
                
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="Pengelola" selected>Pengelola</option> 
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <hr class="my-4">

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password baru..." required>
                </div>

                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password</label>
                    <input class="form-control" id="konfirmasi_password" name="konfirmasi_password" type="password" placeholder="Ulangi password baru..." required>
                </div>
                
                <hr class="my-4">
                
                <button class="btn btn-primary" type="submit">Simpan</button>
                
                <a href="pengelola.php" class="btn btn-light">Batal</a>
                
            </form>
            
        </div>
    </div>

</div>

<?php 
// Sertakan file footer, ini berisi penutup </body>, </html>, dan <script>
include 'footer.php'; 
?>