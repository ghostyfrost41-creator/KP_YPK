CREATE DATABASE IF NOT EXISTS db_osis_kp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_osis_kp;

DROP TABLE IF EXISTS dokumentasi;
DROP TABLE IF EXISTS anggota_osis;
DROP TABLE IF EXISTS jadwal;
DROP TABLE IF EXISTS pengumuman;
DROP TABLE IF EXISTS kegiatan;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE kegiatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kegiatan VARCHAR(150) NOT NULL,
    tanggal DATE NOT NULL,
    lokasi VARCHAR(150) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE pengumuman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    isi TEXT NOT NULL,
    tanggal DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE jadwal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kegiatan VARCHAR(150) NOT NULL,
    tanggal DATE NOT NULL,
    waktu VARCHAR(50) NOT NULL,
    lokasi VARCHAR(150) NOT NULL,
    keterangan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE anggota_osis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jabatan VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) DEFAULT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE dokumentasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    tanggal DATE NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO users (nama, username, password, role) VALUES
('Administrator', 'admin', '$2y$12$tBvnAoR.9iSgnK5QGqou7eXd699yXJc8yjiP9GIA937oAjqzmM76C', 'admin');

INSERT INTO kegiatan (nama_kegiatan, tanggal, lokasi, deskripsi, gambar) VALUES
('Pemilihan Ketua OSIS', '2026-07-10', 'Aula Sekolah', 'Kegiatan pemilihan ketua OSIS sebagai sarana belajar demokrasi bagi siswa.', NULL),
('Bakti Sosial OSIS', '2026-08-15', 'Lingkungan Sekolah', 'Kegiatan sosial untuk menumbuhkan kepedulian siswa terhadap lingkungan sekitar.', NULL),
('Lomba Kebersihan Kelas', '2026-09-05', 'Seluruh Kelas', 'Program OSIS untuk meningkatkan kedisiplinan dan kebersihan lingkungan sekolah.', NULL);

INSERT INTO pengumuman (judul, isi, tanggal) VALUES
('Rapat Pengurus OSIS', 'Seluruh pengurus OSIS dimohon hadir pada rapat koordinasi kegiatan bulanan.', '2026-07-01'),
('Pendaftaran Panitia Kegiatan', 'Siswa yang ingin menjadi panitia kegiatan OSIS dapat mendaftar melalui pengurus OSIS.', '2026-07-03');

INSERT INTO jadwal (nama_kegiatan, tanggal, waktu, lokasi, keterangan) VALUES
('Rapat Koordinasi OSIS', '2026-07-05', '13.00 - 14.30', 'Ruang OSIS', 'Membahas program kerja bulan berjalan.'),
('Persiapan Bakti Sosial', '2026-08-10', '10.00 - 12.00', 'Aula Sekolah', 'Briefing panitia dan pembagian tugas.'),
('Lomba Kebersihan', '2026-09-05', '08.00 - 11.00', 'Area Sekolah', 'Penilaian dilakukan oleh pembina OSIS.');

INSERT INTO anggota_osis (nama, jabatan, kelas, foto) VALUES
('Andi Pratama', 'Ketua OSIS', 'XI IPA 1', NULL),
('Siti Nurhaliza', 'Wakil Ketua OSIS', 'XI IPS 1', NULL),
('Budi Santoso', 'Sekretaris', 'X IPA 2', NULL),
('Rina Lestari', 'Bendahara', 'X IPS 1', NULL);
