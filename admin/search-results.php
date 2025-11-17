<?php
// Sertakan file header
include 'header.php';

// Ambil kata kunci pencarian dari URL ( ?q=... )
// Kita gunakan htmlspecialchars untuk keamanan dasar (mencegah XSS)
$search_query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
?>

<?php
// Sertakan file sidebar
include 'sidebar.php';
?>

<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="search"></i></div>
                <span>Hasil Pencarian</span>
            </h1>
            <div class="page-header-subtitle">Menampilkan hasil untuk: "<?php echo $search_query; ?>"</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">

    <div class="card">
        <div class="card-header">Daftar Hasil Ditemukan</div>
        <div class="card-body">

            <?php if (empty($search_query)): ?>

                <div class="alert alert-warning">
                    Silakan masukkan kata kunci pencarian pada search bar di atas.
                </div>

            <?php else: ?>

                <div class="mb-3">
                    <h5><a href="#">Hasil Pencarian Dummy 1 (Judul Halaman)</a></h5>
                    <p>
                        Ini adalah deskripsi singkat dari hasil pencarian. Teks ini cocok dengan kata kunci
                        "<strong><?php echo $search_query; ?></strong>" yang Anda cari.
                        Anda bisa mengklik judul di atas untuk pergi ke halaman tersebut.
                    </p>
                    <hr>
                </div>

                <div class="mb-3">
                    <h5><a href="sejarah.php">Contoh Link ke Halaman Sejarah</a></h5>
                    <p>
                        Hasil pencarian juga bisa datang dari konten "Sejarah".
                        Kami menemukan kecocokan dengan "<strong><?php echo $search_query; ?></strong>"
                        di dalam konten halaman sejarah.
                    </p>
                    <hr>
                </div>

                <div class="mb-3">
                    <h5><a href="visi-misi.php">Hasil dari Visi atau Misi</a></h5>
                    <p>
                        Deskripsi singkat lainnya. Kata kunci "<strong><?php echo $search_query; ?></strong>"
                        ditemukan di sini.
                    </p>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>

<?php
// Sertakan file footer
include 'footer.php';
?>