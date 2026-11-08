<?php
require_once __DIR__ . '/../includes/auth.php'; require_once __DIR__ . '/../config/koneksi.php'; require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('pengumuman.php'); validate_csrf();
$id=(int)($_POST['id']??0); db_query($conn,'DELETE FROM pengumuman WHERE id=?',[$id]); redirect('pengumuman.php');
