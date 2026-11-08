<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/includes/functions.php';

if (!empty($_SESSION['login_admin']) && $_SESSION['login_admin'] === true) {
    redirect('admin/dashboard.php');
}

$error = $_GET['error'] ?? '';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin OSIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="login-page">
<div class="container">
    <div class="row min-vh-100 align-items-center justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card card-clean overflow-hidden">
                <div class="card-header bg-navy text-white text-center py-4">
                    <img src="assets/images/logo.jpeg" width="82" alt="Logo YPK Anugerah Abadi" class="mb-2 rounded-circle bg-white p-2">
                    <h4 class="mb-1 fw-bold">Login Admin OSIS</h4>
                    <p class="mb-0 text-white-50">YPK Anugerah Abadi</p>
                </div>
                <div class="card-body p-4">
                    <?php if ($error): ?>
                        <div class="alert alert-danger">Username atau password salah.</div>
                    <?php endif; ?>
                    <form action="proses_login.php" method="POST">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-blue w-100">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="index.php" class="text-decoration-none">Kembali ke Beranda</a>
                    </div>
                    <div class="alert alert-info mt-3 mb-0 small">
                        Demo: <b>admin</b> / <b>admin123</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
