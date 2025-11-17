# 📋 Login & Registrasi System - Admin Panel

Sistem login dan registrasi telah diimplementasikan untuk melindungi admin panel. Berikut adalah panduan penggunaan:

## 🔐 Fitur Utama

### 1. **Registrasi Akun Baru**
- **URL:** `http://localhost/PBL_Kel5_NCS-main/admin/register.php`
- **Fields yang diperlukan:**
  - Username (unik)
  - Nama Lengkap
  - Email (unik)
  - No Telepon (opsional)
  - Password (minimal 6 karakter)
  - Konfirmasi Password
- **Validasi:**
  - Email tidak boleh sudah terdaftar
  - Password minimal 6 karakter
  - Password dan konfirmasi harus sama
  - Semua field wajib diisi (kecuali no telepon)

**Alur Registrasi:**
1. User mengisi form registrasi
2. System melakukan validasi input
3. Jika valid → password di-hash dengan BCRYPT
4. Data disimpan ke database tabel `mahasiswa`
5. Redirect ke login page dengan pesan sukses

### 2. **Login**
- **URL:** `http://localhost/PBL_Kel5_NCS-main/admin/login.php`
- **Fields:**
  - Email
  - Password
- **Validasi:**
  - Email dan password wajib diisi
  - Email harus terdaftar di database
  - Password harus cocok (verifikasi dengan BCRYPT)
  - User harus aktif (`is_active = true`)

**Alur Login:**
1. User memasukkan email dan password
2. System mencari user berdasarkan email
3. System verifikasi password dengan BCRYPT
4. Jika valid → Session diset dengan user data
5. Redirect ke dashboard (index.php)

### 3. **Logout**
- **URL:** `http://localhost/PBL_Kel5_NCS-main/admin/logout.php`
- **Fungsi:**
  - Menghapus session
  - Redirect ke login page dengan pesan logout

**Alur Logout:**
1. User klik tombol "Logout" di dropdown user menu
2. Session dihapus
3. User dikembalikan ke login page

### 4. **Profile Management**
- **URL:** `http://localhost/PBL_Kel5_NCS-main/admin/profile.php`
- **Fitur:**
  - Update informasi profil (Nama, No Telepon)
  - Ubah password
  - Lihat email dan username (readonly)

## 🔒 Proteksi Admin Pages

Semua halaman di admin panel dilindungi dengan:
1. **Session Check** di `header.php` → `Auth::requireLogin()`
2. Jika user belum login → redirect ke login.php
3. Jika user sudah login → session tersimpan otomatis

**Halaman yang dilindungi:**
- index.php (dashboard)
- penelitian.php
- penelitian-tambah.php
- profile.php
- Dan semua halaman lain yang include header.php

## 🗄️ Database Integration

### Tabel yang digunakan: `mahasiswa`
```sql
- id (PK)
- username (UNIQUE)
- email (UNIQUE)
- password (hashed dengan BCRYPT)
- nama_lengkap
- no_telepon
- is_active (boolean)
- created_at
- updated_at
```

### Class yang digunakan:
1. **Auth** (`admin/classes/Auth.php`)
   - Mengelola session dan autentikasi
   - Methods: login(), logout(), isLoggedIn(), getUser(), requireLogin(), requireLogout()

2. **User** (`admin/classes/User.php`)
   - Mengelola data pengguna
   - Methods: register(), login(), getUserById(), getUserByEmail(), updateProfile(), changePassword()

## 📝 Testing Credentials

Silakan gunakan akun berikut untuk testing:

### Untuk Register (Buat akun baru):
- Email: `test@example.com`
- Username: `testuser`
- Nama Lengkap: `Test User`
- No Telepon: `08123456789`
- Password: `password123`

### Atau gunakan akun yang sudah ada di database:
(Sesuaikan dengan data yang sudah di-seed)

## 🔧 Troubleshooting

### Masalah: "Email sudah terdaftar" padahal baru daftar
- **Solusi:** Email sudah terdaftar di database, gunakan email yang berbeda

### Masalah: Login gagal dengan "Email atau password salah"
- **Solusi:** Pastikan email dan password benar, case-sensitive

### Masalah: Redirect terus-menerus ke login
- **Solusi:** Clear browser cookies, atau periksa apakah session PHP aktif

### Masalah: Session hilang/logout otomatis
- **Solusi:** Periksa konfigurasi session timeout di php.ini (default 24 menit)

## 📊 Security Features

✅ **Password Hashing:** BCRYPT (industry standard)
✅ **Input Validation:** Semua input divalidasi
✅ **SQL Injection Protection:** Menggunakan Prepared Statements
✅ **Session Protection:** Session check pada setiap halaman admin
✅ **Error Handling:** Pesan error yang aman (tidak expose database details)

## 🚀 Next Steps

Berikutnya bisa implement:
1. **Forgot Password** - Reset password via email
2. **Two-Factor Authentication** - OTP/TOTP untuk extra security
3. **Role-Based Access** - Admin, Staff, Teacher levels
4. **Audit Log** - Catat semua aktivitas user
5. **Email Verification** - Validasi email saat register
6. **Profile Picture** - Upload foto profil

---

**Created:** November 2025
**Status:** ✅ Working
**Testing:** Manual (tested dengan Invoke-WebRequest)
