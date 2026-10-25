# 🌐 TRANSLATION SYSTEM - IMPLEMENTATION GUIDE

## Sistem Translate Sudah Berhasil Diaktifkan!

Sistem multi-bahasa (Indonesia & English) telah berhasil diimplementasikan untuk website publik Jurusan Teknologi Informasi.

---

## 📁 FILE YANG DIBUAT

### 1. **lang/id.php** - Bahasa Indonesia
- Berisi semua string dalam bahasa Indonesia
- Format: Array key-value

### 2. **lang/en.php** - Bahasa English  
- Berisi semua string dalam bahasa English
- Format: Array key-value (sama dengan id.php tapi nilai berbeda)

### 3. **lang-switcher.php** - Language Switcher Handler
- Mengelola session bahasa
- Menangani GET parameter `?lang=id` atau `?lang=en`
- Menyediakan helper functions:
  - `t($key)` - Get translated string
  - `getCurrentLanguage()` - Get current language ('id' or 'en')
  - `getLangUrl($lang)` - Generate URL with language parameter

### 4. **index.php** - UPDATED
- Sudah menggunakan sistem translate
- Semua text hardcoded diganti dengan `t('key')`
- Language dropdown sudah berfungsi
- Dynamic title & lang attribute HTML

---

## 🎯 FITUR YANG SUDAH DITRANSLATE

### Navbar Menu
- Beranda / Home
- Profil / Profile
  - Visi & Misi / Vision & Mission
  - Logo / Logo
  - Struktur Organisasi / Organization Structure
- Arsip / Archive
  - Penelitian / Research
  - Pengabdian / Community Service
- Galeri / Gallery
- Layanan / Services
  - Sarana dan Prasarana / Facilities & Infrastructure
  - Konsultatif / Consultation
- Links / Links

### Breadcrumb
- Beranda / Home
- Cyber Security / Cyber Security

### Main Content
- Lab Title (Lab Network dan Cyber Security / Lab Network and Cyber Security)
- Lab Description 1 & 2 (deskripsi laboratorium dalam 2 bahasa)

### Sidebar
- Berita Terbaru / Latest News

### Footer
- Jurusan Name, Address
- Profile, Archive, Services, Group Links
- Copyright

---

## 🚀 CARA MENGGUNAKAN

### URL Language Switcher
```
Bahasa Indonesia: http://localhost/PBL_Kel5_NCS-main/index.php?lang=id
Bahasa English:   http://localhost/PBL_Kel5_NCS-main/index.php?lang=en
```

### Dropdown Language di Navbar
1. Klik flag icon di **top-right navbar**
2. Pilih **Id** (Indonesia) atau **Eng** (English)
3. Halaman akan refresh dengan bahasa yang dipilih

### Tambah Translation Baru
Jika ingin tambah string baru:

1. **Edit lang/id.php:**
```php
'new_key' => 'Teks Bahasa Indonesia',
```

2. **Edit lang/en.php:**
```php
'new_key' => 'English Text',
```

3. **Gunakan di HTML:**
```php
<?php echo t('new_key'); ?>
```

---

## 📝 STRUKTUR LANG FILES

### id.php (Sample)
```php
<?php
return [
    'nav_home' => 'Beranda',
    'nav_profile' => 'Profil',
    'lab_title' => 'Lab Network dan Cyber Security',
    // ... lebih banyak
];
?>
```

### en.php (Sample)
```php
<?php
return [
    'nav_home' => 'Home',
    'nav_profile' => 'Profile',
    'lab_title' => 'Lab Network and Cyber Security',
    // ... lebih banyak
];
?>
```

---

## 🔧 TECHNICAL DETAILS

### Session Management
- Bahasa disimpan dalam `$_SESSION['language']`
- Default bahasa: Indonesia (id)
- Persisten: Bahasa akan diingat sampai session habis

### Language Switching Logic
```
1. User klik dropdown language
2. Klik Id atau Eng
3. Kirim GET parameter: ?lang=id atau ?lang=en
4. lang-switcher.php:
   - Set $_SESSION['language'] = $_GET['lang']
   - Load file lang yang sesuai
   - Redirect halaman tanpa parameter
5. Halaman muncul dalam bahasa baru
```

### Helper Functions (di lang-switcher.php)
```php
t('key')                    // Get translated string
getCurrentLanguage()        // Get current lang ('id'/'en')
getLangUrl($lang)          // Generate lang-switch URL
```

---

## ✅ TESTING CHECKLIST

- [x] Language files created (id.php, en.php)
- [x] Language switcher file created (lang-switcher.php)
- [x] index.php updated dengan function t()
- [x] Navbar dropdown link sudah functional
- [x] Session management implemented
- [x] Dynamic title & lang attribute
- [x] All menu items translated
- [x] Footer translated
- [x] Breadcrumb translated
- [x] Main content translated

---

## 🚨 NOTES

1. **Session Start Otomatis:** lang-switcher.php akan start session otomatis
2. **Case Sensitive:** Gunakan key yang sama di semua bahasa files
3. **Encoding:** File menggunakan UTF-8 encoding (sudah correct)
4. **Default Language:** Indonesia (id) jika belum dipilih

---

## 📖 NEXT STEPS (OPSIONAL)

1. **Translate halaman guest_page/**
   - profil_visi.php
   - profil_logo.php
   - profil_struktur.php
   - Dll

2. **Translate halaman admin** (jika diperlukan)
   - Walaupun admin biasanya dalam 1 bahasa

3. **Database Translation** (Advanced)
   - Simpan content dinamis dari database dalam berbagai bahasa

4. **Language Auto-Detect**
   - Gunakan browser language untuk auto-detect bahasa awal

---

## 📞 TROUBLESHOOTING

### Masalah: Halaman masih tampil bahasa Indonesia setelah klik English
**Solusi:** Clear browser cache dan cookies, atau gunakan private/incognito mode

### Masalah: Text tidak berubah saat klik dropdown language
**Solusi:** Pastikan lang-switcher.php di-include di awal index.php (sebelum DOCTYPE)

### Masalah: Error "Undefined index" saat akses halaman
**Solusi:** Pastikan semua key di index.php sudah ada di lang files (id.php dan en.php)

---

**Created:** November 2025
**Status:** ACTIVE & READY TO USE
**Languages:** Indonesian (ID), English (EN)

