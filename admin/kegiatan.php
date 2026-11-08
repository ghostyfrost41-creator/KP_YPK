<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../includes/functions.php';
$pageTitle = 'Data Kegiatan';
$data = fetch_all_assoc($conn, 'SELECT * FROM kegiatan ORDER BY tanggal DESC, id DESC');
include __DIR__ . '/../includes/admin_header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3"><h2 class="fw-bold text-navy">Data Kegiatan OSIS</h2><a href="tambah_kegiatan.php" class="btn btn-blue">Tambah Kegiatan</a></div>
<div class="card card-clean"><div class="card-body table-responsive"><table class="table table-bordered table-striped"><thead class="table-primary"><tr><th>No</th><th>Gambar</th><th>Nama Kegiatan</th><th>Tanggal</th><th>Lokasi</th><th>Deskripsi</th><th>Aksi</th></tr></thead><tbody>
<?php $no=1; foreach($data as $row): ?><tr><td><?= $no++; ?></td><td><?php if($row['gambar']): ?><img src="../uploads/<?= e($row['gambar']); ?>" width="80" class="rounded"><?php else: ?>-<?php endif; ?></td><td><?= e($row['nama_kegiatan']); ?></td><td><?= format_tanggal($row['tanggal']); ?></td><td><?= e($row['lokasi']); ?></td><td><?= e(excerpt($row['deskripsi'],80)); ?></td><td><a href="edit_kegiatan.php?id=<?= e($row['id']); ?>" class="btn btn-warning btn-sm">Edit</a> <form action="hapus_kegiatan.php" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')"><?= csrf_field(); ?><input type="hidden" name="id" value="<?= e($row['id']); ?>"><button class="btn btn-danger btn-sm">Hapus</button></form></td></tr><?php endforeach; ?>
<?php if(!$data): ?><tr><td colspan="7" class="text-center text-muted">Belum ada data.</td></tr><?php endif; ?>
</tbody></table></div></div>
<?php include __DIR__ . '/../includes/admin_footer.php'; ?>
