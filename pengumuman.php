<?php
require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Pengumuman';
$data = fetch_all_assoc($conn, 'SELECT * FROM pengumuman ORDER BY tanggal DESC, id DESC');
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light"><div class="container"><h1 class="section-title mb-4">Pengumuman</h1>
<?php foreach ($data as $row): ?><div class="card card-clean mb-3"><div class="card-body"><h4><?= e($row['judul']); ?></h4><p class="small text-muted"><?= format_tanggal($row['tanggal']); ?></p><p><?= nl2br(e($row['isi'])); ?></p></div></div><?php endforeach; ?>
<?php if (!$data): ?><p class="text-muted">Belum ada pengumuman.</p><?php endif; ?>
</div></section>
<?php include __DIR__ . '/includes/footer.php'; ?>
