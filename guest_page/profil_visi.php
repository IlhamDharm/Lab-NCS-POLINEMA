<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Jurusan Teknologi Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
   
<!-- NAVBAR PUTIH + NAVBAR BIRU (FIXED TOP) -->
<nav class="fixed-top bg-white shadow-sm">
    <!-- NAVBAR PUTIH -->
    <div class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../img/jtilogo.png" alt="" style="width: 43px; height: 43px;">
                <div class="ms-3">
                    <h5 class="mb-0 fw-bold" style="font-size: 16px;">Jurusan</h5>
                    <p class="mb-0 fw-bold" style="font-size: 16px;">Teknologi Informasi</p>
                </div>
            </a>

            <!-- Hamburger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#fullNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Bahasa -->
            <div class="d-none d-lg-flex ms-auto">
                <div class="dropdown">
                    <a class="lang-link px-4 py-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="../img/flagind.png" width="24" class="me-2">Id
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><img src="../img/flagind.png" width="24" class="me-2">Id</a></li>
                        <li><a class="dropdown-item" href="#"><img src="../img/flageng.png" width="24" class="me-2">Eng</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Border Kuning -->
    <div class="border-top-orange"></div>
    <!-- NAVBAR BIRU (MENJADI SATU DENGAN NAVBAR PUTIH) -->
    <div class="navbar navbar-expand-lg navbar-dark bg-primary-blue py-0">
        <div class="container">

            <!-- Collapse yang sama -->
            <div class="collapse navbar-collapse" id="fullNav">
                <ul class="navbar-nav w-100">

                    <li class="nav-item">
                        <a class="nav-link px-4 py-3" href="../index.php">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" style="color: white;" href="#" data-bs-toggle="dropdown">
                            Profil
                        </a>
                        
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profil_visi.php">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="profil_logo.php">Logo</a></li>
                            <li><a class="dropdown-item" href="profil_struktur.php">Struktur Organisasi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Arsip
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="arsip_penelitian.php">Penelitian</a></li>
                            <li><a class="dropdown-item" href="arsip_pengabdian.php">Pengabdian</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-4 py-3" href="galeri.php">Galeri</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Layanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="layanan_sp.php">Sarana dan Prasarana</a></li>
                            <li><a class="dropdown-item" href="layanan_k.php">Konsultatif</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-4 py-3" href="links.php">Links</a>
                    </li>

                    <!-- Bahasa di Mobile -->
                    <li class="nav-item d-lg-none px-4 py-3">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <img src="img/flagind.png" width="24" class="me-2">Id
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><img src="img/flagind.png" width="24" class="me-2">Id</a></li>
                                <li><a class="dropdown-item" href="#"><img src="img/flageng.png" width="24" class="me-2">Eng</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</nav>

<!-- Spacer agar konten tidak ketutup navbar -->
<div style="height: 140px;"></div>
    
    <!-- Breadcrumb -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb" class="py-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="profil_visi.php" class="text-decoration-none text-dark">Profil</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">Visi dan Misi</li>
            </ol>
        </nav>
    </div>
    
    <!-- Main Content -->
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <!-- Main Content Column -->
                <div class="col-lg-8">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <h2 class="h3 fw-bold mb-3">Visi dan Misi</h2>
                            <div class="title-underline"></div>
                            <!-- Image Placeholder -->
                            <img src="../img/ncs1.jpg" alt="" class="rounded mb-4 w-100" style="max-height: 200px; object-fit: cover;">
                            <!-- Text Content -->
                            <p class="mb-2 h5 fw-bold" style="line-height: 1.8;">Visi :</p>
                            <p class="mb-2" style="line-height: 1.8;text-align: justify;">
                                Menjadi laboratorium unggulan dalam bidang jaringan dan keamanan siber yang inovatif, adaptif, dan berdaya saing global, serta mendukung pengembangan pendidikan, penelitian, dan pengabdian masyarakat di bidang Teknologi Informasi.
                            </p>
                            <p class="mb-2 h5 fw-bold" style="line-height: 1.8;">Misi :</p>
                              <ul class="list-misi mb-0" style="line-height: 1.8;text-align: justify;">
<li>Menyelenggarakan kegiatan praktikum yang berkualitas untuk menghasilkan lulusan dengan kompetensi tinggi di bidang jaringan komputer dan keamanan siber.</li>
<li>Mengembangkan penelitian terapan dalam bidang jaringan, keamanan sistem, Internet of Things (IoT), serta teknologi monitoring yang relevan dengan kebutuhan industri dan masyarakat.</li>
<li>Menyediakan layanan uji keamanan, pendampingan, serta pelatihan bagi civitas akademika maupun mitra eksternal melalui kerja sama dengan industri, pemerintah, dan lembaga lainnya.</li>
<li>Meningkatkan kapasitas dosen, teknisi, dan asisten laboratorium dalam menguasai teknologi terkini melalui pelatihan, sertifikasi, dan partisipasi aktif dalam komunitas profesional.</li>
<li>Mendukung peningkatan literasi keamanan digital masyarakat melalui workshop, seminar, dan program pengabdian berbasis teknologi informasi.</li>
</ul>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar Column -->
                <div class="col-lg-4">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Berita Terbaru</h5>
                            <div class="title-underline"></div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <a href="#" class="text-decoration-none text-dark small">
                                        beritasberita,ekrasidsua,dsklghsduy,fgse safluhesufghsuidgtye saflsuifhs
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   <?php require '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>