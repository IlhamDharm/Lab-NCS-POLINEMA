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
                <div class="page-header-icon"><i data-feather="image"></i></div>
                <span>Galeri & Agenda</span>
            </h1>
            <div class="page-header-subtitle">Mengelola agenda kegiatan dan galeri dokumentasi</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Agenda (Kegiatan Akan Datang)</span>
            <button class="btn btn-primary btn-sm">Tambah Agenda Baru</button>
        </div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Lokasi / Platform</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Webinar Nasional: Masa Depan AI</td>
                            <td>2025-12-10</td>
                            <td>Zoom Meeting</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Ubah"><i data-feather="edit-2"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Rapat Tinjauan Kurikulum Internal</td>
                            <td>2025-11-28</td>
                            <td>Gedung Rektorat Lt. 4</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Ubah"><i data-feather="edit-2"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Galeri (Dokumentasi Kegiatan)</span>
            <button class="btn btn-primary btn-sm">Tambah Album Galeri</button>
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://source.unsplash.com/random/500x300?conference" alt="Foto Dokumentasi" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Seminar Internasional 2025</h5>
                            <p class="card-text small text-muted">Tanggal: 2025-10-15</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" type="button">Ubah</button>
                            <button class="btn btn-sm btn-outline-danger" type="button">Hapus</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://source.unsplash.com/random/500x300?meeting" alt="Foto Dokumentasi" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Workshop Penulisan Jurnal</h5>
                            <p class="card-text small text-muted">Tanggal: 2025-09-22</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" type="button">Ubah</button>
                            <button class="btn btn-sm btn-outline-danger" type="button">Hapus</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://source.unsplash.com/random/500x300?community" alt="Foto Dokumentasi" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Pengabdian Masyarakat Desa Binaan</h5>
                            <p class="card-text small text-muted">Tanggal: 2025-08-05</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" type="button">Ubah</button>
                            <button class="btn btn-sm btn-outline-danger" type="button">Hapus</button>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
            
        </div>
    </div>

</div>

<?php 
// Sertakan file footer, ini berisi penutup </body>, </html>, dan <script>
include 'footer.php'; 
?>