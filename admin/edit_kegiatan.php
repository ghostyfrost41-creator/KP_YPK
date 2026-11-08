<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../includes/functions.php';
$id=(int)($_GET['id']??0);
$row=fetch_one_assoc($conn,'SELECT * FROM kegiatan WHERE id=?',[$id]);
if(!$row) redirect('kegiatan.php');
$pageTitle='Edit Kegiatan';
include __DIR__ . '/../includes/admin_header.php';
?>
<h2 class="fw-bold text-navy mb-3">Edit Kegiatan</h2>
<div class="card card-clean"><div class="card-body"><form action="update_kegiatan.php" method="POST" enctype="multipart/form-data"><?= csrf_field(); ?><input type="hidden" name="id" value="<?= e($row['id']); ?>"><input type="hidden" name="gambar_lama" value="<?= e($row['gambar']); ?>"><div class="mb-3"><label class="form-label">Nama Kegiatan</label><input type="text" name="nama_kegiatan" class="form-control" value="<?= e($row['nama_kegiatan']); ?>" required></div><div class="row"><div class="col-md-6 mb-3"><label class="form-label">Tanggal</label><input type="date" name="tanggal" class="form-control" value="<?= e($row['tanggal']); ?>" required></div><div class="col-md-6 mb-3"><label class="form-label">Lokasi</label><input type="text" name="lokasi" class="form-control" value="<?= e($row['lokasi']); ?>" required></div></div><div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="deskripsi" class="form-control" rows="4" required><?= e($row['deskripsi']); ?></textarea></div><?php if($row['gambar']): ?><img src="../uploads/<?= e($row['gambar']); ?>" width="120" class="rounded mb-2"><?php endif; ?><div class="mb-3"><label class="form-label">Ganti Gambar</label><input type="file" name="gambar" class="form-control" accept="image/jpeg,image/png,image/webp"></div><button class="btn btn-blue">Update</button> <a href="kegiatan.php" class="btn btn-secondary">Kembali</a></form></div></div>
<?php include __DIR__ . '/../includes/admin_footer.php'; ?>
