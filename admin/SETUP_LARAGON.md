# ✅ SOLUSI: Setup PostgreSQL Extension untuk Laragon

## Masalah
Anda menggunakan **Laragon** bukan XAMPP. Extension PostgreSQL tidak ter-enable dan ada versi mismatch antara PHP CLI dan PHP yang dijalankan Apache.

## Solusi

### 1. ✓ Extension Sudah Ditambahkan ke php.ini
File `C:\laragon\bin\php\php-8.3.26-Win32-vs16-x64\php.ini` sudah diupdate dengan:
```
extension=pdo_pgsql
extension=pgsql
```

### 2. ✓ Laragon Services Sudah Di-Restart
Apache dan PHP di Laragon sudah distartkembali agar membaca konfigurasi baru.

### 3. Verifikasi Melalui Browser (Recommended)

**Langkah paling penting**: Akses test connection melalui **browser**, bukan command line!

#### Option A: Jika project sudah ada di `C:\laragon\www`
```
http://localhost/PBL_Kel5_NCS-main/admin/test_connection.php
```

#### Option B: Jika project belum ada di www, copy ke sana
1. Copy folder `PBL_Kel5_NCS-main` ke `C:\laragon\www\`
2. Akses di browser: `http://localhost/PBL_Kel5_NCS-main/admin/test_connection.php`

#### Option C: Gunakan Laragon Quick Links
1. Buka Laragon
2. Klik kanan di tray icon
3. Pilih "Open Laragon Root"
4. Copy project ke folder `www`

### 4. Test Connection.php via Browser
Buka browser dan akses file test_connection.php. Sekarang extension sudah benar!

## Mengapa Harus Via Browser?

- **PHP CLI** tidak menggunakan extension dari Laragon
- **Apache (Web Server)** menggunakan php.ini dari Laragon dengan extension yang tepat
- Extension binary harus match dengan PHP version yang berjalan

## Troubleshooting

### Jika masih error "could not find driver"
1. Pastikan PostgreSQL **sudah running**
   - Buka pgAdmin atau psql
   - Verify koneksi ke localhost:5433

2. Pastikan database `PBL` **sudah dibuat**
   ```sql
   CREATE DATABASE PBL;
   ```

3. Pastikan Laragon Apache **sudah running**
   - Check Laragon tray icon
   - Warna hijau = running

### Jika Apache tidak mau start
- Stop semua service di Laragon
- Tunggu 10 detik
- Start ulang
- Check di `C:\laragon\laragon.exe` log

## Next Steps

1. ✓ Extension PostgreSQL sudah di-enable di php.ini Laragon
2. ✓ Laragon services sudah di-restart  
3. **Buka browser dan akses test_connection.php**
4. Jika hijau ✓ - lanjut ke implementasi
5. Jika merah ✗ - pastikan PostgreSQL running dan database sudah dibuat

---

**PENTING**: Jangan test via command line. Selalu gunakan **BROWSER** untuk test koneksi dengan Laragon!
