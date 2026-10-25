# Lab Network dan Cyber Security (NCS)

Website profil dan sistem informasi **Laboratorium Network dan Cyber Security** pada Jurusan Teknologi Informasi. Project ini menyediakan halaman publik untuk menampilkan informasi laboratorium, arsip penelitian, pengabdian, layanan, serta panel admin untuk mengelola konten dan data terkait.

## Fitur

### Halaman publik

- Beranda profil Laboratorium Network dan Cyber Security.
- Informasi profil: visi dan misi, logo, serta struktur organisasi.
- Arsip penelitian dan pengabdian kepada masyarakat.
- Informasi layanan sarana dan prasarana serta layanan konsultatif.
- Galeri dan tautan terkait jurusan/laboratorium.
- Tampilan responsif menggunakan Bootstrap 5.
- Dukungan bahasa Indonesia dan English melalui language switcher berbasis session.

### Panel admin

- Registrasi akun, login, logout, dan pengelolaan profil pengguna.
- Proteksi halaman admin menggunakan session authentication.
- Dashboard administrasi.
- Pengelolaan data laboratorium, dosen/pengelola, penelitian, pengabdian, berita, fasilitas, galeri, dan konten profil.
- Operasi CRUD menggunakan class model dan PDO.
- Password pengguna disimpan menggunakan hashing BCRYPT.
- Query database menggunakan prepared statements untuk mengurangi risiko SQL injection.

## Teknologi

- **PHP** native dan pemrograman berorientasi objek.
- **PostgreSQL** sebagai database.
- **PDO PostgreSQL (`pdo_pgsql`)** sebagai driver koneksi database.
- **Bootstrap 5.3** untuk komponen dan layout antarmuka.
- **Bootstrap Icons** untuk ikon.
- HTML, CSS, dan JavaScript.

## Struktur Project

```text
.
├── index.php                 # Halaman utama publik
├── navbar.php                # Komponen navigasi
├── footer.php                # Komponen footer
├── style.css                 # Style halaman publik
├── lang-switcher.php         # Pengelola bahasa dan session bahasa
├── lang/
│   ├── id.php                # Terjemahan Bahasa Indonesia
│   └── en.php                # Terjemahan Bahasa Inggris
├── guest_page/               # Halaman publik tambahan
│   ├── profil_visi.php
│   ├── profil_logo.php
│   ├── profil_struktur.php
│   ├── arsip_penelitian.php
│   ├── arsip_pengabdian.php
│   ├── layanan_sp.php
│   ├── layanan_k.php
│   └── galeri.php
├── admin/
│   ├── login.php             # Login admin
│   ├── register.php          # Registrasi akun
│   ├── logout.php            # Logout dan penghapusan session
│   ├── index.php             # Dashboard admin
│   ├── profile.php           # Pengaturan profil pengguna
│   ├── classes/              # Class koneksi dan model data
│   │   ├── Database.php
│   │   ├── Auth.php
│   │   ├── User.php
│   │   ├── Laboratorium.php
│   │   ├── Penelitian.php
│   │   ├── Pengabdian.php
│   │   └── ...
│   ├── css/                  # Style panel admin
│   ├── js/                   # JavaScript panel admin
│   └── assets/               # Asset, font, dan demo komponen
└── img/                      # Gambar dan logo halaman publik
```

## Persyaratan

Pastikan perangkat telah memiliki:

- Web server, misalnya Apache melalui XAMPP, Laragon, atau konfigurasi PHP built-in server.
- PHP dengan ekstensi berikut:
  - `pdo`
  - `pdo_pgsql`
  - `pgsql`
  - `session`
- PostgreSQL.
- Browser modern.

Driver `PDO_PGSQL` diperlukan agar PHP dapat terhubung ke PostgreSQL melalui PDO.

## Deployment frontend static ke Vercel

Project ini menyediakan versi frontend static khusus untuk Vercel. Gunakan file berikut sebagai entry point:

```text
index.html
```

Halaman static publik tersedia di `guest_page/*.html`. File PHP asli tetap disimpan untuk referensi/local development, tetapi tidak diperlukan untuk menampilkan frontend static.

### Deploy melalui dashboard Vercel

1. Push project ke GitHub.
2. Import repository dari dashboard Vercel.
3. Pada **Framework Preset**, pilih `Other`.
4. Kosongkan **Build Command**.
5. Kosongkan **Output Directory** atau gunakan root project (`.`).
6. Klik **Deploy**.

Jangan mengatur project sebagai runtime PHP. Vercel akan menyajikan `index.html` dan halaman HTML di dalam `guest_page/` sebagai static files.

### Deploy melalui Vercel CLI

Dari root project jalankan:

```bash
npx vercel
```

Saat ditanya build command, pilih tanpa build command. Setelah deployment selesai, buka URL production yang diberikan Vercel.

> Form pada halaman layanan saat ini hanya berupa tampilan frontend. Pengiriman data belum tersambung ke backend atau database.

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/IlhamDharm/Lab-NCS-POLINEMA.git
cd Lab-NCS-POLINEMA
```

Jika project sudah berada di komputer lokal, cukup masuk ke folder project:

```bash
cd PBL_Kel5_NCS-main
```

### 2. Siapkan database PostgreSQL

Buat database dengan nama `PBL`, atau gunakan nama database lain lalu sesuaikan konfigurasi pada `admin/classes/Database.php`.

Konfigurasi bawaan project saat ini adalah:

```text
Host     : 127.0.0.1
Port     : 5433
Database : PBL
User     : postgres
```

> Password database saat ini ditulis langsung di `admin/classes/Database.php`. Untuk deployment atau repository publik, sebaiknya pindahkan kredensial ke environment variable atau file konfigurasi lokal yang tidak di-commit.

Import schema dan seed data project ke database PostgreSQL apabila tersedia. Repository ini tidak menyertakan file dump `.sql`, sehingga struktur database perlu disiapkan dari schema/database project yang digunakan oleh tim.

### 3. Sesuaikan koneksi database

Buka file berikut:

```text
admin/classes/Database.php
```

Kemudian sesuaikan nilai host, nama database, username, password, dan port PostgreSQL dengan environment lokal.

Pastikan PostgreSQL berjalan pada port yang sama. Konfigurasi bawaan menggunakan port `5433`, bukan port PostgreSQL standar `5432`.

### 4. Jalankan aplikasi

#### Menggunakan XAMPP/Laragon

1. Salin folder project ke directory web server, misalnya `htdocs`.
2. Jalankan Apache dan PostgreSQL.
3. Buka halaman publik:

```text
http://localhost/PBL_Kel5_NCS-main/
```

#### Menggunakan PHP built-in server

Dari root project jalankan:

```bash
php -S localhost:8000
```

Kemudian buka:

```text
http://localhost:8000/
```

## Akses halaman

| Halaman | URL contoh |
|---|---|
| Halaman publik | `http://localhost/PBL_Kel5_NCS-main/` |
| Login admin | `http://localhost/PBL_Kel5_NCS-main/admin/login.php` |
| Registrasi admin | `http://localhost/PBL_Kel5_NCS-main/admin/register.php` |
| Dashboard admin | `http://localhost/PBL_Kel5_NCS-main/admin/index.php` |
| Bahasa Indonesia | `index.php?lang=id` |
| English | `index.php?lang=en` |

Akun admin dapat dibuat melalui halaman registrasi. Setelah login berhasil, halaman admin yang dilindungi hanya dapat diakses oleh pengguna dengan session aktif.

## Sistem bahasa

Bahasa publik disimpan pada session PHP. Bahasa default adalah Bahasa Indonesia.

Untuk menambahkan teks baru:

1. Tambahkan key dan teks Bahasa Indonesia ke `lang/id.php`.
2. Tambahkan key yang sama dan terjemahannya ke `lang/en.php`.
3. Tampilkan teks menggunakan helper:

```php
<?php echo t('nama_key'); ?>
```

Language switcher menerima parameter `?lang=id` atau `?lang=en` dan menyimpan pilihan bahasa pada session.

## Keamanan

Beberapa mekanisme keamanan yang digunakan project:

- Password di-hash menggunakan BCRYPT.
- Password diverifikasi menggunakan `password_verify()`.
- Halaman admin dilindungi oleh pemeriksaan session.
- Query database menggunakan prepared statements PDO.
- Validasi input diterapkan pada proses login dan registrasi.

Untuk penggunaan production, lakukan hal berikut:

- Jangan menyimpan password database di repository.
- Gunakan environment variable untuk konfigurasi rahasia.
- Gunakan HTTPS.
- Nonaktifkan tampilan error database kepada pengguna umum.
- Gunakan password database yang kuat dan batasi hak akses user database.
- Pastikan file dokumentasi atau konfigurasi lokal tidak membocorkan kredensial.

## Dokumentasi tambahan

- `admin/LOGIN_GUIDE.md` — panduan login, registrasi, logout, dan profile.
- `admin/AUTH_SYSTEM_DOCS.md` — dokumentasi sistem autentikasi.
- `admin/LOGOUT_GUIDE.md` — dokumentasi alur logout.
- `TRANSLATION_GUIDE.md` — panduan sistem multi-bahasa.
- `admin/SYSTEM_SUMMARY.md` — ringkasan arsitektur dan fitur sistem.

## Pengembangan

Project ini dikembangkan sebagai project-based learning untuk kebutuhan informasi dan pengelolaan konten Laboratorium Network dan Cyber Security pada Jurusan Teknologi Informasi POLINEMA.

## Lisensi

Lisensi project belum ditentukan. Tambahkan file lisensi apabila project akan didistribusikan secara resmi.
