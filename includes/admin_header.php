<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Admin OSIS';
}
$namaAdmin = $_SESSION['nama_admin'] ?? $_SESSION['username_admin'] ?? 'Admin';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-navy shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="dashboard.php">
            <img src="../assets/images/logo.jpeg" alt="Logo YPK Anugerah Abadi" width="38" class="rounded-circle bg-white p-1">
            Admin OSIS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="pengumuman.php">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link" href="jadwal.php">Jadwal</a></li>
                <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
                <li class="nav-item"><a class="nav-link" href="dokumentasi.php">Dokumentasi</a></li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small"><?= e($namaAdmin); ?></span>
                <a href="../index.php" class="btn btn-outline-light btn-sm">Lihat Website</a>
                <a href="../logout.php" class="btn btn-light btn-sm">Logout</a>
            </div>
        </div>
    </div>
</nav>
<div class="container-fluid py-4">
