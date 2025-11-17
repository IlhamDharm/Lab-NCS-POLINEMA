<?php
require_once __DIR__ . '/classes/Auth.php';
require_once __DIR__ . '/classes/User.php';

$auth = new Auth();
$auth->requireLogin('login.php');
$currentUser = $auth->getUser();
$user = new User();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'update_profile') {
        $nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
        $no_telepon = trim($_POST['no_telepon'] ?? '');

        if (empty($nama_lengkap)) {
            $error = 'Nama lengkap tidak boleh kosong!';
        } else {
            $data = [
                'nama_lengkap' => $nama_lengkap,
                'no_telepon' => $no_telepon
            ];
            
            $result = $user->updateProfile($currentUser['id'], $data);
            if ($result['success']) {
                // Update session
                $_SESSION['nama_lengkap'] = $nama_lengkap;
                $currentUser = $auth->getUser();
                $success = 'Profil berhasil diupdate!';
            } else {
                $error = $result['message'] ?? 'Update profil gagal';
            }
        }
    } elseif ($action === 'change_password') {
        $old_password = $_POST['old_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
            $error = 'Semua field password harus diisi!';
        } elseif (strlen($new_password) < 6) {
            $error = 'Password baru minimal 6 karakter!';
        } elseif ($new_password !== $confirm_password) {
            $error = 'Password baru dan konfirmasi tidak cocok!';
        } else {
            $result = $user->changePassword($currentUser['id'], $old_password, $new_password);
            if ($result['success']) {
                $success = 'Password berhasil diubah!';
            } else {
                $error = $result['message'] ?? 'Perubahan password gagal';
            }
        }
    }
}

include 'header.php';
include 'sidebar.php';
?>

<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="user"></i></div>
                <span>Profile Saya</span>
            </h1>
            <div class="page-header-subtitle">Kelola informasi akun dan keamanan</div>
        </div>
    </div>
</div>

<div class="container-fluid mt-n10">
    <div class="row">
        <div class="col-lg-8">
            <!-- Update Profile Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Profil</h5>
                </div>
                <div class="card-body">
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

                    <form action="profile.php" method="POST">
                        <input type="hidden" name="action" value="update_profile">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" 
                                value="<?php echo htmlspecialchars($currentUser['username']); ?>" disabled>
                            <small class="text-muted">Username tidak dapat diubah</small>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" 
                                value="<?php echo htmlspecialchars($currentUser['email']); ?>" disabled>
                            <small class="text-muted">Email tidak dapat diubah</small>
                        </div>

                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="<?php echo htmlspecialchars($currentUser['nama_lengkap']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No Telepon</label>
                            <input type="tel" class="form-control" id="no_telepon" name="no_telepon"
                                value="<?php echo htmlspecialchars($_POST['no_telepon'] ?? $currentUser['no_telepon'] ?? ''); ?>">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="feather" data-feather="save"></i> Simpan Perubahan
                            </button>
                            <a href="index.php" class="btn btn-secondary">
                                <i class="feather" data-feather="arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <!-- Change Password Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Ubah Password</h5>
                </div>
                <div class="card-body">
                    <form action="profile.php" method="POST">
                        <input type="hidden" name="action" value="change_password">
                        
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru (minimal 6 karakter)</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="feather" data-feather="key"></i> Ubah Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
