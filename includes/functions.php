<?php
function e($value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function csrf_token(): string
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function validate_csrf(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $token = $_POST['csrf_token'] ?? '';
    if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
        die('CSRF token tidak valid. Silakan kembali dan coba lagi.');
    }
}

function db_query(PDO $conn, string $sql, array $params = []): PDOStatement
{
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(array_values($params));
        return $stmt;
    } catch (PDOException $exception) {
        error_log('Database query failed: ' . $exception->getMessage());
        http_response_code(500);
        die('Terjadi kesalahan saat mengakses database.');
    }
}

function fetch_all_assoc(PDO $conn, string $sql, array $params = []): array
{
    return db_query($conn, $sql, $params)->fetchAll();
}

function fetch_one_assoc(PDO $conn, string $sql, array $params = []): ?array
{
    $row = db_query($conn, $sql, $params)->fetch();
    return $row === false ? null : $row;
}

function format_tanggal(?string $tanggal): string
{
    if (!$tanggal || $tanggal === '0000-00-00') {
        return '-';
    }
    $time = strtotime($tanggal);
    if (!$time) {
        return e($tanggal);
    }
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    return date('d', $time) . ' ' . $bulan[(int)date('m', $time)] . ' ' . date('Y', $time);
}

function excerpt(?string $text, int $limit = 120): string
{
    $text = trim(strip_tags((string)$text));
    if (mb_strlen($text) <= $limit) {
        return $text;
    }
    return mb_substr($text, 0, $limit) . '...';
}

function upload_image(?array $file, string $targetDir = '../uploads/'): ?string
{
    if (!$file || !isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Upload gagal. Kode error: ' . $file['error']);
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        throw new Exception('Ukuran file maksimal 2 MB.');
    }

    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp'
    ];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!isset($allowed[$mime])) {
        throw new Exception('Format gambar harus JPG, PNG, atau WEBP.');
    }

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $filename = 'img_' . date('YmdHis') . '_' . bin2hex(random_bytes(6)) . '.' . $allowed[$mime];
    $path = rtrim($targetDir, '/\\') . DIRECTORY_SEPARATOR . $filename;

    if (!move_uploaded_file($file['tmp_name'], $path)) {
        throw new Exception('Gagal memindahkan file upload.');
    }

    return $filename;
}

function delete_upload(?string $filename): void
{
    if (!$filename) {
        return;
    }
    $path = __DIR__ . '/../uploads/' . basename($filename);
    if (is_file($path)) {
        unlink($path);
    }
}
