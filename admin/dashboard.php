<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../includes/functions.php';
$pageTitle = 'Dashboard Admin';
$counts = [
    'Kegiatan' => fetch_one_assoc($conn, 'SELECT COUNT(*) total FROM kegiatan')['total'] ?? 0,
    'Pengumuman' => fetch_one_assoc($conn, 'SELECT COUNT(*) total FROM pengumuman')['total'] ?? 0,
    'Jadwal' => fetch_one_assoc($conn, 'SELECT COUNT(*) total FROM jadwal')['total'] ?? 0,
    'Anggota' => fetch_one_assoc($conn, 'SELECT COUNT(*) total FROM anggota_osis')['total'] ?? 0,
    'Dokumentasi' => fetch_one_assoc($conn, 'SELECT COUNT(*) total FROM dokumentasi')['total'] ?? 0,
];
include __DIR__ . '/../includes/admin_header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div><h2 class="fw-bold text-navy mb-1">Dashboard Admin</h2><p class="text-muted mb-0">Kelola informasi OSIS YPK Anugerah Abadi.</p></div>
</div>
<div class="row g-3">
    <?php foreach ($counts as $label => $total): ?>
        <div class="col-md-6 col-xl-3"><div class="card stat-card"><div class="card-body"><p class="text-muted mb-1"><?= e($label); ?></p><h2 class="fw-bold text-navy"><?= e($total); ?></h2></div></div></div>
    <?php endforeach; ?>
</div>
<div class="card card-clean mt-4"><div class="card-body"><h5 class="fw-bold mb-3">Menu Cepat</h5><div class="d-flex flex-wrap gap-2"><a href="kegiatan.php" class="btn btn-blue">Kegiatan</a><a href="pengumuman.php" class="btn btn-blue">Pengumuman</a><a href="jadwal.php" class="btn btn-blue">Jadwal</a><a href="anggota.php" class="btn btn-blue">Anggota</a><a href="dokumentasi.php" class="btn btn-blue">Dokumentasi</a></div></div></div>
<?php include __DIR__ . '/../includes/admin_footer.php'; ?>
