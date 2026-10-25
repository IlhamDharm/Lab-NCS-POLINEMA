<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Jurusan Teknologi Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR PUTIH + NAVBAR BIRU (FIXED TOP) -->
<nav class="fixed-top bg-white shadow-sm">
    <!-- NAVBAR PUTIH -->
    <div class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="img/jtilogo.png" alt="" style="width: 43px; height: 43px;">
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
                        <img src="img/flagind.png" width="24" class="me-2">Id
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><img src="img/flagind.png" width="24" class="me-2">Id</a></li>
                        <li><a class="dropdown-item" href="#"><img src="img/flageng.png" width="24" class="me-2">Eng</a></li>
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
                        <a class="nav-link text-white px-4 py-3" style="color: white;" href="index.php">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Profil
                        </a>
                        <ul class="dropdown-menu bg-pimary">
                            <li><a class="dropdown-item" href="guest_page/profil_visi.php">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="guest_page/profil_logo.php">Logo</a></li>
                            <li><a class="dropdown-item" href="guest_page/profil_struktur.php">Struktur Organisasi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Arsip
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="guest_page/arsip_penelitian.php">Penelitian</a></li>
                            <li><a class="dropdown-item" href="guest_page/arsip_pengabdian.php">Pengabdian</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-4 py-3" href="#">Galeri</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Layanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="guest_page/layanan_sp.php">Sarana dan Prasarana</a></li>
                            <li><a class="dropdown-item" href="guest_page/layanan_k.php">Konsultatif</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-4 py-3" href="#">Links</a>
                    </li>

                    <!-- Bahasa di Mobile -->
                    <li class="nav-item d-lg-none px-4 py-3">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <img src="img/flag<?php echo getCurrentLanguage(); ?>.png" width="24" class="me-2"><?php echo strtoupper(getCurrentLanguage()); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo getLangUrl('id'); ?>"><img src="img/flagind.png" width="24" class="me-2">Id</a></li>
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

    
    <!-- Hero Section -->
    <section class="position-relative text-white text-center" style="height: 400px; overflow: hidden;">
        <!-- Background Image -->
        <img src="img/lab.png" 
             alt="Hero Background" 
             class="position-absolute top-0 start-0 w-100 h-100" 
             style="object-fit: cover; z-index: 1;">
        
        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50" style="z-index: 2;"></div>
        
        <!-- Text Content -->
        <div class="container position-relative h-100 d-flex align-items-center justify-content-center" style="z-index: 3;">
            <h1 class="display-3 fw-bold">Lab Network dan Cyber Security</h1>
        </div>
    </section>
    
    <!-- Breadcrumb -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb" class="py-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-dark">Beranda</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">Cyber Security</li>
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
                            <h2 class="h3 fw-bold mb-3">Lab Network dan Cyber Security</h2>
                            <div class="title-underline"></div>
                            <!-- Image Placeholder -->
                            <img src="img/ncs1.jpg" alt="" class="rounded mb-4 w-100" style="max-height: 200px; object-fit: cover;">
                            <!-- Text Content -->
                            <p class="mb-2" style="line-height: 1.8;text-align: justify;">
                                Unit penunjang akademik di Jurusan Teknologi Informasi yang difokuskan pada pengembangan kompetensi di bidang jaringan komputer dan keamanan siber. Laboratorium ini mendukung kegiatan praktikum, penelitian, dan pengembangan yang berkaitan dengan administrasi jaringan, pengamanan infrastruktur, pemantauan lalu lintas data, hingga penerapan teknologi keamanan informasi dalam melindungi aset digital organisasi.
                            </p>
                            <p class="mb-0" style="line-height: 1.8;text-align: justify;">
                                Selain menjadi sarana pembelajaran mahasiswa, <span class="color-primary-blue">Laboratorium Jaringan & Keamanan Siber</span> juga berperan sebagai wadah penelitian dan inovasi bagi dosen maupun mahasiswa dalam mengkaji solusi di bidang keamanan jaringan, pengujian sistem, serta perlindungan data dan infrastruktur digital. Peran laboratorium ini diharapkan mampu memperkuat kualitas pembelajaran, memperdalam riset di bidang jaringan komputer dan keamanan informasi, serta mendukung terciptanya lulusan yang kompeten di bidang administrasi jaringan dan keamanan siber.
                            </p>
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
    
  <!-- Footer -->
    <footer class="bg-white border-top pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row g-4">
                <!-- Logo and Info Column -->
                <div class="col-md-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="img/jtilogo.png" alt="" style="width: 80px; height: 80px; font-size: 36px;">
                    </div>
                    <h6 class="fw-bold mb-2">Jurusan Teknologi Informasi</h6>
                    <p class="small text-dark mb-2">Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                    <div class="small text-dark mb-3">
                        <a href="#" class="text-dark me-2"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-dark me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-dark me-2"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                
           
                
                <!-- Column 2 -->
                <div class="col-md-2">
                    <h6 class="fw-bold mb-3">Profil</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Visi & Misi</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Logo</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Struktur Organisasi</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
                <div class="col-md-2">
                    <h6 class="fw-bold mb-3">Arsip</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Penelitian</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Pengabdian</a></li>
                    </ul>
                </div>

                <!-- Column 4 -->
                <div class="col-md-2">
                    <h6 class="fw-bold mb-3">Layanan</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Sarana dan Prasarana</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Konsultatif</a></li>
                    </ul>
                </div>

                <!-- Column 5 -->
                <div class="col-md-2">
                    <h6 class="fw-bold mb-3">Kelompok</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Abim</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Adam</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Dina</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Ilham</a></li>
                        <li class="mb-2"><a href="#" class="text-dark text-decoration-none small">Yanuar</a></li>
                    </ul>
                </div>

            </div>
            
            <!-- Copyright -->
            <div class="row mt-4 pt-3">
                <div class="col text-center">
                    <p class="mb-0 small text-dark">© 2025 Jurusan Teknologi Informasi. All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>