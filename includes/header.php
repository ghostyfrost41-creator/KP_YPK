<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Website OSIS YPK Anugerah Abadi';
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-navy sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php">
            <img src="assets/images/logo.jpeg" alt="Logo YPK Anugerah Abadi" width="42" class="rounded-circle bg-white p-1">
            OSIS YPK Anugerah Abadi
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="pengumuman.php">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link" href="jadwal.php">Jadwal</a></li>
                <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                <li class="nav-item"><a class="btn btn-light btn-sm ms-lg-2 mt-2 mt-lg-1" href="login.php">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>
