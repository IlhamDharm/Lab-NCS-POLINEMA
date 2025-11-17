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
                <span>Edit Pengelola</span>
            </h1>
            <div class="page-header-subtitle">Mengubah data pengguna yang sudah ada</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="card mb-4">
        <div class="card-header">Formulir Edit Pengelola</div>
        <div class="card-body">
            
            <?php
                // Data dummy, seolah-olah diambil dari database
                $user_id = 1;
                $user_username = "admin";
                $user_nama = "Administrator Utama";
                $user_role = "Admin";
            ?>

            <form action="" method="POST">
                
                <input type="hidden" name="id" value="<?php echo $user_id; ?>">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" name="username" type="text" value="<?php echo $user_username; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan nama lengkap..." value="<?php echo $user_nama; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="Pengelola" <?php echo ($user_role == 'Pengelola') ? 'selected' : ''; ?>>Pengelola</option>
                        <option value="Admin" <?php echo ($user_role == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>

                <hr class="my-4">
                
                <h5>Ubah Password (Opsional)</h5>
                <small class="form-text text-muted mb-3">Kosongkan bidang di bawah ini jika Anda tidak ingin mengubah password.</small>

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password baru...">
                </div>

                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                    <input class="form-control" id="konfirmasi_password" name="konfirmasi_password" type="password" placeholder="Ulangi password baru...">
                </div>
                
                <hr class="my-4">
                
                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                
                <a href="pengelola.php" class="btn btn-light">Batal</a>
                
            </form>
            
        </div>
    </div>

</div>

<?php 
// Sertakan file footer, ini berisi penutup </body>, </html>, dan <script>
include 'footer.php'; 
?>