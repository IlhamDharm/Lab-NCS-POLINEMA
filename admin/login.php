<?php
require_once __DIR__ . '/classes/Auth.php';

$auth = new Auth();
$auth->requireLogout('index.php');

$error = '';
$success = '';

// Handle messages dari query string
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'logout') {
        $success = 'Anda telah berhasil logout. Silakan login kembali.';
    } elseif ($_GET['msg'] === 'register') {
        $success = 'Registrasi berhasil! Silakan login dengan akun Anda.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Email dan password harus diisi!';
    } else {
        $result = $auth->login($email, $password);
        if ($result['success']) {
            header('Location: index.php');
            exit();
        } else {
            $error = $result['message'] ?? 'Login gagal';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
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
                    
                    <h2 class="fw-bold mb-3">Welcome Back!</h2>
                    <p class="mb-4 text-muted">
                        Tidak punya akun? <a href="register.php" class="fw-bold text-dark">Buat akun baru sekarang.</a> GRATIS! Hanya membutuhkan waktu beberapa menit.
                    </p>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i><?php echo htmlspecialchars($success); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="abcdefg@mail.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required autofocus>
                            <label for="email">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="d-grid mb-2">
                            <button class="btn btn-dark btn-lg fw-semibold" type="submit">Login Now</button>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn btn-light btn-lg fw-semibold btn-google" type="button">
                                <i class="bi bi-google me-2"></i> Login with Google
                            </button>
                        </div>

                        <div class="text-center">
                            <span class="text-muted">Lupa Password?</span> <a href="lupa_password.php" class="fw-bold text-dark">klik di sini</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>