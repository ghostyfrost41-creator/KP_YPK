<?php
require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Beranda - OSIS YPK Anugerah Abadi';
$kegiatan = fetch_all_assoc($conn, 'SELECT * FROM kegiatan ORDER BY tanggal DESC, id DESC LIMIT 3');
$pengumuman = fetch_all_assoc($conn, 'SELECT * FROM pengumuman ORDER BY tanggal DESC, id DESC LIMIT 3');
$jadwal = fetch_all_assoc($conn, 'SELECT * FROM jadwal ORDER BY tanggal ASC, id DESC LIMIT 3');
include __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-light text-navy mb-3">Portal Informasi Siswa</span>
                <h1 class="display-5 fw-bold mb-3">Website OSIS YPK Anugerah Abadi</h1>
                <p class="lead mb-4">Media informasi kegiatan, pengumuman, jadwal, dan dokumentasi OSIS yang mudah diakses siswa.</p>
                <a href="kegiatan.php" class="btn btn-light btn-lg">Lihat Kegiatan</a>
                <a href="pengumuman.php" class="btn btn-outline-light btn-lg ms-2">Pengumuman</a>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-3 text-center">
            <div class="col-md-4"><div class="card card-clean p-4"><h4 class="text-navy fw-bold">Informasi Cepat</h4><p class="mb-0">Siswa dapat melihat pengumuman terbaru.</p></div></div>
            <div class="col-md-4"><div class="card card-clean p-4"><h4 class="text-navy fw-bold">Manajemen Kegiatan</h4><p class="mb-0">Admin dapat mengelola kegiatan OSIS.</p></div></div>
            <div class="col-md-4"><div class="card card-clean p-4"><h4 class="text-navy fw-bold">Dokumentasi</h4><p class="mb-0">Foto kegiatan tersimpan dalam galeri.</p></div></div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Kegiatan Terbaru</h2>
            <a href="kegiatan.php" class="btn btn-blue">Lihat Semua</a>
        </div>
        <div class="row g-4">
            <?php foreach ($kegiatan as $row): ?>
                <div class="col-md-4">
                    <div class="card card-clean h-100">
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="uploads/<?= e($row['gambar']); ?>" class="card-img-top card-img-top-fixed" alt="Kegiatan">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="fw-bold"><?= e($row['nama_kegiatan']); ?></h5>
                            <p class="small text-muted mb-2"><?= format_tanggal($row['tanggal']); ?> | <?= e($row['lokasi']); ?></p>
                            <p><?= e(excerpt($row['deskripsi'], 110)); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (!$kegiatan): ?><p class="text-muted">Belum ada kegiatan.</p><?php endif; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <h2 class="section-title mb-3">Pengumuman</h2>
                <?php foreach ($pengumuman as $row): ?>
                    <div class="card card-clean mb-3"><div class="card-body"><h5><?= e($row['judul']); ?></h5><p class="text-muted small"><?= format_tanggal($row['tanggal']); ?></p><p class="mb-0"><?= e(excerpt($row['isi'], 140)); ?></p></div></div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title mb-3">Jadwal Terdekat</h2>
                <?php foreach ($jadwal as $row): ?>
                    <div class="card card-clean mb-3"><div class="card-body"><h5><?= e($row['nama_kegiatan']); ?></h5><p class="text-muted small mb-1"><?= format_tanggal($row['tanggal']); ?>, <?= e($row['waktu']); ?></p><p class="mb-0"><?= e($row['lokasi']); ?></p></div></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
