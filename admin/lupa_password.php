<?php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lupa Password</title>
    
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
                    
                    <h2 class="fw-bold mb-3">Lupa Password Anda?</h2>
                    
                    <p class="mb-4 text-muted">
                        Jangan khawatir. Masukkan email Anda dan kami akan mengirimkan link untuk reset password.
                    </p>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success; ?>
                        </div>
                    <?php endif; ?>

                    <form action="lupa_password.php" method="POST">

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email Anda" required>
                            <label for="email">Masukan email Anda</label>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn btn-dark btn-lg fw-semibold" type="submit">Kirim Link Reset</button>
                        </div>

                        <div class="text-center">
                            <span classm="text-muted">Ingat passwordnya?</span> <a href="login.php" class="fw-bold text-dark">Kembali ke Login</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>