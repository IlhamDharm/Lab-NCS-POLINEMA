<?php
require_once __DIR__ . '/classes/Auth.php';
require_once __DIR__ . '/classes/User.php';

$auth = new Auth();
$auth->requireLogout('index.php');

$user = new User();
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
    $no_telepon = trim($_POST['no_telepon'] ?? '');

    // Validasi
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($nama_lengkap)) {
        $error = 'Semua field harus diisi!';
    } elseif (strlen($password) < 6) {
        $error = 'Password minimal 6 karakter!';
    } elseif ($password !== $confirm_password) {
        $error = 'Password dan konfirmasi password tidak cocok!';
    } else {
        // Cek email sudah terdaftar
        $existingUser = $user->getUserByEmail($email);
        if ($existingUser) {
            $error = 'Email sudah terdaftar!';
        } else {
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'nama_lengkap' => $nama_lengkap,
                'no_telepon' => $no_telepon,
                'is_active' => true
            ];

            $result = $user->register($data);
            if ($result['success']) {
                // Redirect ke login dengan pesan sukses
                header('Location: login.php?msg=register');
                exit();
            } else {
                $error = $result['message'] ?? 'Registrasi gagal';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Register Page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="container-fluid-login">
        <div class="row g-0">

            <div class="col-lg-6 d-flex align-items-center justify-content-center bg-login text-white left-column">
                <div class="info-content">
                    <h1 class="display-4 fw-bold">Halo!</h1>
                    <p class="fs-5 mt-3">
                        Lorem ipsum lorem lorem ispum ilsum logem
                        ipsum lorem logem lorem iwetuya yaaka
                        ya yi ka.
                    </p>
                    <footer class="mt-5">
                        &copy; 2025 Group 5. All rights reserved
                    </footer>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center bg-login-light right-column">
                <div class="login-form-container">
                    
                    <h2 class="fw-bold mb-3">Formulir Registrasi</h2>
                    
                    <p class="mb-4 text-muted">
                        Sudah memiliki akun? <a href="login.php" class="fw-bold text-dark">klik di sini</a>
                    </p>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form action="register.php" method="POST">
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo htmlspecialchars($_POST['nama_lengkap'] ?? ''); ?>" required>
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email@mail.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="no_telepon" name="no_telepon" placeholder="08XXXXXXXXXX" value="<?php echo htmlspecialchars($_POST['no_telepon'] ?? ''); ?>">
                            <label for="no_telepon">No Telepon (Opsional)</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password (minimal 6 karakter)</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required>
                            <label for="confirm_password">Konfirmasi Password</label>
                        </div>

                        <div class="d-grid mb-2">
                            <button class="btn btn-dark btn-lg fw-semibold" type="submit">Daftar</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>