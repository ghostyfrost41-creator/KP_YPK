<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../includes/functions.php';
$pageTitle = 'Tambah Kegiatan';
include __DIR__ . '/../includes/admin_header.php';
?>
<h2 class="fw-bold text-navy mb-3">Tambah Kegiatan</h2>
<div class="card card-clean"><div class="card-body"><form action="simpan_kegiatan.php" method="POST" enctype="multipart/form-data"><?= csrf_field(); ?><div class="mb-3"><label class="form-label">Nama Kegiatan</label><input type="text" name="nama_kegiatan" class="form-control" required></div><div class="row"><div class="col-md-6 mb-3"><label class="form-label">Tanggal</label><input type="date" name="tanggal" class="form-control" required></div><div class="col-md-6 mb-3"><label class="form-label">Lokasi</label><input type="text" name="lokasi" class="form-control" required></div></div><div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="deskripsi" class="form-control" rows="4" required></textarea></div><div class="mb-3"><label class="form-label">Gambar</label><input type="file" name="gambar" class="form-control" accept="image/jpeg,image/png,image/webp"></div><button class="btn btn-blue">Simpan</button> <a href="kegiatan.php" class="btn btn-secondary">Kembali</a></form></div></div>
<?php include __DIR__ . '/../includes/admin_footer.php'; ?>
