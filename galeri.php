<?php
require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Galeri Dokumentasi';
$data = fetch_all_assoc($conn, 'SELECT * FROM dokumentasi ORDER BY tanggal DESC, id DESC');
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light"><div class="container"><h1 class="section-title mb-4">Galeri Dokumentasi</h1><div class="row g-4">
<?php foreach ($data as $row): ?><div class="col-md-4"><div class="card card-clean h-100"><?php if (!empty($row['gambar'])): ?><img src="uploads/<?= e($row['gambar']); ?>" class="card-img-top card-img-top-fixed" alt="Dokumentasi"><?php endif; ?><div class="card-body"><h5><?= e($row['judul']); ?></h5><p class="small text-muted"><?= format_tanggal($row['tanggal']); ?></p><p><?= e($row['deskripsi']); ?></p></div></div></div><?php endforeach; ?>
<?php if (!$data): ?><p class="text-muted">Belum ada dokumentasi.</p><?php endif; ?>
</div></div></section>
<?php include __DIR__ . '/includes/footer.php'; ?>
