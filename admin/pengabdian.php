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
                <div class="page-header-icon"><i data-feather="briefcase"></i></div>
                <span>Pengabdian</span>
            </h1>
            <div class="page-header-subtitle">Mengelola data pengabdian kepada masyarakat</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Pengabdian</span>
            <a href="pengabdian-tambah.php" class="btn btn-primary btn-sm">Tambah Pengabdian Baru</a>
        </div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th>Judul Pengabdian</th>
                            <th>Pengabdi</th>
                            <th>Tahun</th>
                            <th style="width: 130px;">File PDF</th>
                            <th style="width: 60px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>Pelatihan Literasi Digital untuk UMKM Desa Maju Jaya</td>
                            <td>Prof. Dr. Rina Wijaya, S.E., M.Si.</td>
                            <td>2024</td>
                            <td>
                                <a href="files/dummy-pengabdian-1.pdf" class="btn btn-sm btn-info" target="_blank" title="Download PDF">
                                    <i data-feather="download" class="mr-1" style="width:1rem; height:1rem;"></i> Download
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>Workshop Penggunaan Pupuk Organik untuk Petani Lokal</td>
                            <td>Tim Dosen Pertanian</td>
                            <td>2024</td>
                            <td>
                                <a href="files/dummy-pengabdian-2.pdf" class="btn btn-sm btn-info" target="_blank" title="Download PDF">
                                    <i data-feather="download" class="mr-1" style="width:1rem; height:1rem;"></i> Download
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td>Program Pendampingan Belajar untuk Anak-Anak Panti Asuhan</td>
                            <td>Dr. Budi Santoso, M.Kom.</td>
                            <td>2023</td>
                            <td>
                                <a href="files/dummy-pengabdian-3.pdf" class="btn btn-sm btn-info" target="_blank" title="Download PDF">
                                    <i data-feather="download" class="mr-1" style="width:1rem; height:1rem;"></i> Download
                                </a>
                            </td>
                            <td>
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