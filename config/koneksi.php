<?php
$host = getenv('SUPABASE_DB_HOST') ?: '';
$port = getenv('SUPABASE_DB_PORT') ?: '5432';
$db = getenv('SUPABASE_DB_NAME') ?: 'postgres';
$user = getenv('SUPABASE_DB_USER') ?: '';
$pass = getenv('SUPABASE_DB_PASSWORD');
$sslmode = getenv('SUPABASE_DB_SSLMODE') ?: 'require';

if ($host === '' || $user === '' || $pass === false || $pass === '') {
    http_response_code(500);
    die('Konfigurasi Supabase belum lengkap. Atur SUPABASE_DB_HOST, SUPABASE_DB_USER, dan SUPABASE_DB_PASSWORD.');
}

if (!ctype_digit($port) || !in_array($sslmode, ['require', 'verify-ca', 'verify-full'], true)) {
    http_response_code(500);
    die('Konfigurasi port atau SSL Supabase tidak valid.');
}

$dsn = sprintf(
    'pgsql:host=%s;port=%s;dbname=%s;sslmode=%s',
    $host,
    $port,
    $db,
    $sslmode
);

try {
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $exception) {
    error_log('Supabase connection failed: ' . $exception->getMessage());
    http_response_code(500);
    die('Koneksi ke Supabase gagal. Periksa konfigurasi database dan ekstensi PDO PostgreSQL.');
}
