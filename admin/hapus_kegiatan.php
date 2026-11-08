<?php
require_once __DIR__ . '/../includes/auth.php'; require_once __DIR__ . '/../config/koneksi.php'; require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('kegiatan.php');
validate_csrf();
$id=(int)($_POST['id']??0); $row=fetch_one_assoc($conn,'SELECT gambar FROM kegiatan WHERE id=?',[$id]); if($row) delete_upload($row['gambar']); db_query($conn,'DELETE FROM kegiatan WHERE id=?',[$id]); redirect('kegiatan.php');
