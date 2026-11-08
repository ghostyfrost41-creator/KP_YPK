<?php
require_once __DIR__ . '/../includes/auth.php'; require_once __DIR__ . '/../config/koneksi.php'; require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('pengumuman.php');
validate_csrf();
$judul=trim($_POST['judul']??''); $tanggal=trim($_POST['tanggal']??''); $isi=trim($_POST['isi']??'');
if($judul===''||$tanggal===''||$isi==='') die('Semua data wajib diisi.');
db_query($conn,'INSERT INTO pengumuman (judul,tanggal,isi) VALUES (?,?,?)',[$judul,$tanggal,$isi]); redirect('pengumuman.php');
