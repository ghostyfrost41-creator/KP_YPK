<?php
require_once __DIR__ . '/../includes/auth.php'; require_once __DIR__ . '/../config/koneksi.php'; require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('pengumuman.php'); validate_csrf();
$id=(int)($_POST['id']??0); $judul=trim($_POST['judul']??''); $tanggal=trim($_POST['tanggal']??''); $isi=trim($_POST['isi']??'');
db_query($conn,'UPDATE pengumuman SET judul=?, tanggal=?, isi=? WHERE id=?',[$judul,$tanggal,$isi,$id]); redirect('pengumuman.php');
