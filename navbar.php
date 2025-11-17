<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
     <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="img/jtilogo.png" alt="" style="width: 40px; height: 40px; font-size: 20px;">
                <div class="ms-3">
                    <h5 class="mb-0 fw-bold" style="font-size: 16px;">Jurusan</h5>
                    <p class="mb-0 fw-bold" style="font-size: 16px;">Teknologi Informasi</p>
                </div>
            </a>
            
            <!-- Right side items -->
            <div class="d-flex align-items-center gap-3 ms-auto">
                <div class="d-flex align-items-center gap-2 dropdown">
                    <a class="lang-linkpx-4 py-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="img/flagind.png" alt="" style="width: 24px; height: 24px;" class="me-2 shadow">Id</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><img src="img/flagind.png" alt="" style="width: 24px; height: 24px;" class="me-2 shadow">Id</a></li>
                        <li><a class="dropdown-item" href="#"><img src="img/flageng.png" alt="" style="width: 24px; height: 24px;" class="me-2 shadow">Eng</a></li>
                    </ul>
                </div>
                <button class="btn btn-link text-dark p-0">
                    <i class="bi bi-search fs-5"></i>
                </button>
            </div>
        </div>
    </nav>
    
    <!-- Top Orange Border -->
    <div class="border-top-orange"></div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary-blue navbar-dark p-0 ">
        <div class="container ">
            <ul class="navbar-nav w-100 d-flex align-items-center justify-content-center">
                <li class="nav-item">
                    <a class="nav-link px-4 py-3" href="#">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-4 py-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="#">Sejarah</a></li>
                        <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="#">Dosen</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-4 py-3 bg-secondary-blue dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Galeri
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Foto Kegiatan</a></li>
                        <li><a class="dropdown-item" href="#">Video</a></li>
                        <li><a class="dropdown-item" href="#">Dokumentasi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-3" href="#">Arsip</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-4 py-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Akademik</a></li>
                        <li><a class="dropdown-item" href="#">Kemahasiswaan</a></li>
                        <li><a class="dropdown-item" href="#">Penelitian</a></li>
                        <li><a class="dropdown-item" href="#">Pengabdian Masyarakat</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-3" href="#">Links</a>
                </li>
            </ul>
        </div>
    </nav>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>