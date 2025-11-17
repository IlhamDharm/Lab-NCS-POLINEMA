# 🚪 LOGOUT BUTTON - LOKASI & CARA PENGGUNAAN

## 📍 Dimana Logout Button Berada?

### **JAWABAN: TOP-RIGHT CORNER (POJOK KANAN ATAS) ADMIN PANEL**

```
┌─────────────────────────────────────────────────────────────┐
│                     ADMIN NAVBAR                            │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  Logo  Menu  [🔍 Search]  [🔔]  [📧]  [👤] ← LOGOUT HERE  │
│                                                             │
│                            Top-Right Corner                 │
│                            (User Icon/Photo)                │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

---

## 🎯 STEP-BY-STEP CARA LOGOUT

### **Step 1: Login Terlebih Dahulu**
```
URL: http://localhost/PBL_Kel5_NCS-main/admin/login.php
├─ Isi email
├─ Isi password
└─ Klik "Login Now"
   ↓
   ✓ Masuk ke dashboard
```

### **Step 2: Lihat Top-Right Corner**
```
Perhatikan pojok kanan atas halaman admin
├─ Ada icon user (foto/avatar)
├─ Ada search bar
└─ Ada icon-icon lainnya
   ↓
   ICON USER INI YANG KAMU CARI!
```

### **Step 3: Click Icon User**
```
Klik pada icon user (foto) di top-right
├─ Bisa di sebelah search bar
├─ Atau di ujung paling kanan navbar
└─ Dropdown menu akan muncul
   ↓
   ✓ Dropdown terbuka
```

### **Step 4: Lihat Menu Dropdown**
```
Setelah dropdown terbuka, akan terlihat:

┌──────────────────────────┐
│ 👤 Nama User             │
│    email@example.com     │
├──────────────────────────┤
│ ⚙️  Profile Saya         │
│                          │
│ 🚪 Logout ← KLIK INI!   │
└──────────────────────────┘

2 pilihan menu:
1. Profile Saya (untuk update nama, telepon, password)
2. Logout (untuk keluar) ← INI!
```

### **Step 5: Klik Logout**
```
Klik pada "Logout"
├─ Browser akan redirect otomatis
├─ Anda akan ke halaman login
└─ Session akan dihapus
   ↓
   ✓ Success!
```

### **Step 6: Lihat Pesan Sukses**
```
Setelah logout, di login page akan muncul:

┌────────────────────────────────────────────┐
│ ✓ Anda telah berhasil logout.             │
│   Silakan login kembali.                  │
└────────────────────────────────────────────┘

Alert box warna HIJAU
Message: "Anda telah berhasil logout..."
```

---

## 🖼️ Visual Diagram

### **Navbar Admin Panel:**
```
ADMIN NAVBAR
┌─────────────────────────────────────────────────────────┐
│                                                         │
│  ≡ Toggle  Search [Search...]  🔔 🔊 💬 👤 Icon      │
│                                           ▼             │
│  Sidebar  Logo                    Dropdown Menu Opens  │
│                                    ├─ Nama User        │
│                                    ├─ Email User       │
│                                    ├─ Settings         │
│                                    └─ Logout ← HERE!  │
│                                                         │
└─────────────────────────────────────────────────────────┘
      ↑                                    ↑
      Sidebar Toggle               Top-Right Corner
                                   (User Controls)
```

---

## ✨ Yang Terjadi Setelah Logout

### **1. Session Dihapus**
- ✅ `session_destroy()` dijalankan
- ✅ Semua data session hilang
- ✅ Cookie session dihapus

### **2. Redirect Otomatis**
- ✅ Browser redirect ke login.php
- ✅ URL berubah ke: `login.php?msg=logout`
- ✅ Tidak perlu input lagi

### **3. Pesan Sukses Tampil**
- ✅ Alert box hijau muncul
- ✅ Pesan: "Anda telah berhasil logout..."
- ✅ Bisa ditutup dengan X button

### **4. Tidak Bisa Akses Admin**
- ✅ Jika coba akses page admin tanpa login ulang
- ✅ Otomatis redirect ke login
- ✅ Session tidak ada → harus login lagi

---

## 🔐 Security Info

### **Apa yang Terjadi di Backend:**

```php
// logout.php runs when user clicks logout button

require_once __DIR__ . '/classes/Auth.php';
$auth = new Auth();

// This is called:
$auth->logout();  // ← Destroy session

// Redirect with message:
header('Location: login.php?msg=logout');
exit();

// Result:
// ✓ Session destroyed
// ✓ User data cleared
// ✓ Redirect to login
// ✓ Message shown
```

---

## 🎯 Quick Logout Flow

```
1. USER CLICKS LOGOUT
         ↓
2. BROWSER SENDS REQUEST TO logout.php
         ↓
3. logout.php RUNS:
   ├─ Session destroyed
   ├─ Redirect called
   └─ exit()
         ↓
4. BROWSER REDIRECTS TO login.php?msg=logout
         ↓
5. LOGIN PAGE DISPLAYS:
   ├─ Success message (green)
   ├─ Login form
   └─ Ready for login again
         ↓
6. IF TRY ACCESS ADMIN PAGE:
   ├─ header.php checks session
   ├─ Session not found
   └─ Redirect to login page
```

---

## ❓ FAQ

**Q: Logout button tidak bisa saya temukan?**
- A: Pastikan sudah login (button hanya muncul saat login)
- A: Cari di TOP-RIGHT CORNER navbar (icon user/foto)
- A: Klik icon tersebut untuk dropdown menu

**Q: Setelah logout, bisa akses admin?**
- A: Tidak bisa! Session sudah dihapus
- A: Harus login lagi untuk akses admin pages

**Q: Pesan logout tidak muncul?**
- A: Cek di login page (setelah redirect)
- A: Alert box hijau dengan pesan sukses
- A: Bisa ditutup dengan X button

**Q: Bisa logout di halaman lain, bukan hanya index?**
- A: Ya! Logout button ada di navbar semua halaman admin
- A: Selama header.php diinclude, logout button ada

---

## 📱 Responsive Design

Logout button responsive untuk:
- ✅ Desktop (tampil normal di top-right)
- ✅ Tablet (tampil di hamburger menu atau top-right)
- ✅ Mobile (tampil di hamburger menu)

---

## 🎉 KESIMPULAN

| Aspek | Detail |
|-------|--------|
| **Lokasi** | Top-Right Corner (icon user) |
| **Cara Akses** | Klik icon user → Dropdown → Logout |
| **Efek** | Session dihapus, redirect ke login |
| **Pesan** | Green alert: "Anda telah berhasil logout..." |
| **Keamanan** | Aman & secure (session destroyed) |
| **Status** | ✅ Fully Working |

---

**LOGOUT BUTTON SIAP DIGUNAKAN!** 🚀
