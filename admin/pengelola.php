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
                <div class="page-header-icon"><i data-feather="user-check"></i></div>
                <span>Pengelola</span>
            </h1>
            <div class="page-header-subtitle">Mengelola data pengguna dan administrator sistem</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Pengelola</span>
            <a href="pengelola-tambah.php" class="btn btn-primary btn-sm">Tambah Pengelola Baru</a>
        </div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>admin</td>
                            <td>Administrator Utama</td>
                            <td>Admin</td>
                            <td>
                                <a href="pengelola-edit.php?id=1" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Edit">
                                    <i data-feather="edit-2"></i>
                                </a>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>budi.p</td>
                            <td>Budi Purnomo</td>
                            <td>Pengelola</td>
                            <td>
                                <a href="pengelola-edit.php?id=2" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Edit">
                                    <i data-feather="edit-2"></i>
                                </a>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>siti.n</td>
                            <td>Siti Nurbaya</td>
                            <td>Pengelola</td>
                            <td>
                                <a href="pengelola-edit.php?id=3" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Edit">
                                    <i data-feather="edit-2"></i>
                                </a>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>
                        
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