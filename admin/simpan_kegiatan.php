<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('kegiatan.php');
validate_csrf();
$nama = trim($_POST['nama_kegiatan'] ?? '');
$tanggal = trim($_POST['tanggal'] ?? '');
$lokasi = trim($_POST['lokasi'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');
if ($nama === '' || $tanggal === '' || $lokasi === '') die('Data wajib diisi.');
try {
    $gambar = upload_image($_FILES['gambar'] ?? null, '../uploads/');
    db_query($conn, 'INSERT INTO kegiatan (nama_kegiatan,tanggal,lokasi,deskripsi,gambar) VALUES (?,?,?,?,?)', [$nama,$tanggal,$lokasi,$deskripsi,$gambar]);
    redirect('kegiatan.php');
} catch (Exception $e) { die('Gagal simpan kegiatan: ' . e($e->getMessage())); }
