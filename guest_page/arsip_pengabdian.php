<?php require_once __DIR__ . '/../lang-switcher.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getCurrentLanguage() === 'id' ? 'Jurusan Teknologi Informasi' : 'Department of Information Technology'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
</head>
<style>
.badge {
    transition: all 0.3s ease;
    border-radius: 20px;
}

.badge:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}
</style>
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
                        <a class="nav-link px-4 py-3" href="../index.php"><?php echo t('nav_home'); ?></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <?php echo t('nav_profile'); ?>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profil_visi.php">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="profil_logo.php">Logo</a></li>
                            <li><a class="dropdown-item" href="profil_struktur.php">Struktur Organisasi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link px-4 py-3 dropdown-toggle" style="color: white;" href="#" data-bs-toggle="dropdown">
                            <?php echo t('nav_archive'); ?>
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="arsip_penelitian.php">Penelitian</a></li>
                            <li><a class="dropdown-item" href="arsip_pengabdian.php">Pengabdian</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-4 py-3" href="galeri.php"><?php echo t('nav_gallery'); ?></a>
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
                        <a class="nav-link px-4 py-3" href="links.php"><?php echo t('nav_links'); ?></a>
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
                <li class="breadcrumb-item "><a href="arsip_pengabdian.php" class="text-decoration-none text-dark"><?php echo t('nav_archive'); ?></a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page"><?php echo t('archive_service_title'); ?></li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <!-- Main Content Column -->
                <div class="">
                    <div class=" border-0">
                        <div class="card-body p-0">
                            <h2 class="h3 fw-bold mb-3"><?php echo t('archive_service_title'); ?></h2>
                            <div class="title-underline"></div>

                            <!-- Tag tahun -->
                            <section class="py-3 bg-white mb-3">
                                <div class="container">
                                    <div class="d-flex gap-2">
                                        <span class="badge rounded-4 text-dark border px-4 py-2 fs-6 shadow">2025</span>
                                        <span class="badge rounded-4 text-dark border px-4 py-2 fs-6 shadow">2024</span>
                                        <span class="badge rounded-4 text-dark border px-4 py-2 fs-6 shadow">2023</span>
                                    </div>
                                </div>
                            </section>
                            <h2 class="h4 fw-bold mb-3 py-3">Pengabdian Masyarakat Tahun 2025</h2>
                            <!-- tabel -->
                             <table class="table table-striped-columns">
                                <thead class="bg-primary-blue" >
                                    <tr>
                                        <th class="bg-primary-blue" style="color: white;" scope="col">No</th>
                                        <th class="bg-primary-blue" style="color: white;" scope="col">Ketua</th>
                                        <th class="bg-primary-blue" style="color: white;" scope="col">Anggota</th>
                                        <th class="bg-primary-blue" style="color: white;" scope="col">Prodi</th>
                                        <th class="bg-primary-blue" style="color: white;" scope="col">Judul</th>
                                        <th class="bg-primary-blue" style="color: white;" scope="col">Skema</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>asda</td>
                                        <td>32r</td>
                                    </tr>
                                </tbody>
                                </table>

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