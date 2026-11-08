<?php
require_once __DIR__ . '/config/koneksi.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Jadwal Kegiatan';
$data = fetch_all_assoc($conn, 'SELECT * FROM jadwal ORDER BY tanggal ASC, id DESC');
include __DIR__ . '/includes/header.php';
?>
<section class="py-5 bg-light"><div class="container"><h1 class="section-title mb-4">Jadwal Kegiatan</h1><div class="card card-clean"><div class="card-body table-responsive"><table class="table table-striped"><thead><tr><th>No</th><th>Kegiatan</th><th>Tanggal</th><th>Waktu</th><th>Lokasi</th><th>Keterangan</th></tr></thead><tbody>
<?php $no=1; foreach ($data as $row): ?><tr><td><?= $no++; ?></td><td><?= e($row['nama_kegiatan']); ?></td><td><?= format_tanggal($row['tanggal']); ?></td><td><?= e($row['waktu']); ?></td><td><?= e($row['lokasi']); ?></td><td><?= e($row['keterangan']); ?></td></tr><?php endforeach; ?>
<?php if (!$data): ?><tr><td colspan="6" class="text-center text-muted">Belum ada jadwal.</td></tr><?php endif; ?>
</tbody></table></div></div></div></section>
<?php include __DIR__ . '/includes/footer.php'; ?>
