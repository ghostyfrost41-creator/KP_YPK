<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../includes/functions.php';
$pageTitle='Data Pengumuman';
$data=fetch_all_assoc($conn,'SELECT * FROM pengumuman ORDER BY tanggal DESC, id DESC');
include __DIR__ . '/../includes/admin_header.php';
?>
<div class="d-flex justify-content-between mb-3"><h2 class="fw-bold text-navy">Data Pengumuman</h2><a href="tambah_pengumuman.php" class="btn btn-blue">Tambah Pengumuman</a></div>
<div class="card card-clean"><div class="card-body table-responsive"><table class="table table-bordered table-striped"><thead class="table-primary"><tr><th>No</th><th>Judul</th><th>Tanggal</th><th>Isi</th><th>Aksi</th></tr></thead><tbody><?php $no=1; foreach($data as $row): ?><tr><td><?= $no++; ?></td><td><?= e($row['judul']); ?></td><td><?= format_tanggal($row['tanggal']); ?></td><td><?= e(excerpt($row['isi'],100)); ?></td><td><a href="edit_pengumuman.php?id=<?= e($row['id']); ?>" class="btn btn-warning btn-sm">Edit</a> <form action="hapus_pengumuman.php" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')"><?= csrf_field(); ?><input type="hidden" name="id" value="<?= e($row['id']); ?>"><button class="btn btn-danger btn-sm">Hapus</button></form></td></tr><?php endforeach; ?><?php if(!$data): ?><tr><td colspan="5" class="text-center text-muted">Belum ada data.</td></tr><?php endif; ?></tbody></table></div></div>
<?php include __DIR__ . '/../includes/admin_footer.php'; ?>
