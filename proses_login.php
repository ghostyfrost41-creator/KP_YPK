<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('login.php');
}

validate_csrf();

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    redirect('login.php?error=1');
}

$user = fetch_one_assoc($conn, 'SELECT * FROM users WHERE username = ? LIMIT 1', [$username]);

if (!$user || !password_verify($password, $user['password'])) {
    redirect('login.php?error=1');
}

session_regenerate_id(true);
$_SESSION['login_admin'] = true;
$_SESSION['id_admin'] = $user['id'];
$_SESSION['nama_admin'] = $user['nama'];
$_SESSION['username_admin'] = $user['username'];
$_SESSION['role_admin'] = $user['role'];

redirect('admin/dashboard.php');
