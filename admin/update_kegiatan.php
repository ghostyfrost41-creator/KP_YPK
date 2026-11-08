<?php
require_once __DIR__ . '/../includes/auth.php'; require_once __DIR__ . '/../config/koneksi.php'; require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('kegiatan.php');
validate_csrf();
$id=(int)($_POST['id']??0); $nama=trim($_POST['nama_kegiatan']??''); $tanggal=trim($_POST['tanggal']??''); $lokasi=trim($_POST['lokasi']??''); $deskripsi=trim($_POST['deskripsi']??''); $gambar=$_POST['gambar_lama']??'';
try { if(!empty($_FILES['gambar']['name'])) { $baru=upload_image($_FILES['gambar'],'../uploads/'); if($baru){ delete_upload($gambar); $gambar=$baru; } } db_query($conn,'UPDATE kegiatan SET nama_kegiatan=?, tanggal=?, lokasi=?, deskripsi=?, gambar=? WHERE id=?',[$nama,$tanggal,$lokasi,$deskripsi,$gambar,$id]); redirect('kegiatan.php'); } catch(Exception $e){ die('Gagal update kegiatan: '.e($e->getMessage())); }
