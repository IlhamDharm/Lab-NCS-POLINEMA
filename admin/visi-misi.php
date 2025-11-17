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
                <div class="page-header-icon"><i data-feather="smile"></i></div>
                <span>Visi Misi</span>
            </h1>
            <div class="page-header-subtitle">Mengelola konten untuk halaman visi dan misi</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">

    <div class="card mb-4">
        <div class="card-header">Formulir Visi</div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="visiContent">Konten Visi</label>
                    <textarea class="form-control" id="visiContent" name="visiContent" rows="10">
Menjadi pusat unggulan dalam penelitian dan pengabdian masyarakat yang inovatif, berdaya saing global, dan berlandaskan nilai-nilai luhur untuk kemajuan bangsa.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </textarea>
                </div>

                <button class="btn btn-primary" type="submit">Ubah Visi</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Tabel Misi</span>
            <button class="btn btn-primary btn-sm">Tambah Misi Baru</button>
        </div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th>Judul Misi</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Melaksanakan penelitian inovatif dan berkualitas tinggi yang relevan dengan kebutuhan
                                masyarakat dan industri.</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Ubah"><i
                                        data-feather="edit-2"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i
                                        data-feather="trash-2"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Menyelenggarakan kegiatan pengabdian kepada masyarakat yang berbasis hasil penelitian
                                untuk pemberdayaan.</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Ubah"><i
                                        data-feather="edit-2"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i
                                        data-feather="trash-2"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Membangun jaringan kemitraan yang kuat dengan berbagai pihak di tingkat nasional dan
                                internasional.</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Ubah"><i
                                        data-feather="edit-2"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Hapus"><i
                                        data-feather="trash-2"></i></button>
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