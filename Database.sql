-- ==========================================
-- DATABASE SISTEM MANAJEMEN TUGAS MAGANG
-- ==========================================

CREATE DATABASE IF NOT EXISTS manajemen_tugas_magang;

USE manajemen_tugas_magang;


-- ==========================================
-- TABLE USER / LOGIN
-- ==========================================

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','mahasiswa') DEFAULT 'mahasiswa'
);


-- ==========================================
-- TABLE MAHASISWA
-- ==========================================

CREATE TABLE mahasiswa (
    id_mahasiswa INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    nim VARCHAR(20) NOT NULL,
    nama_mahasiswa VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100),
    perusahaan_magang VARCHAR(100),
    tanggal_mulai DATE,
    tanggal_selesai DATE,

    FOREIGN KEY (id_user) REFERENCES users(id_user)
    ON DELETE CASCADE
);


-- ==========================================
-- TABLE TUGAS
-- ==========================================

CREATE TABLE tugas (
    id_tugas INT AUTO_INCREMENT PRIMARY KEY,
    id_mahasiswa INT,
    judul_tugas VARCHAR(150) NOT NULL,
    deskripsi TEXT,
    deadline DATE,
    file_tugas VARCHAR(255),
    status ENUM('Belum Dikerjakan','Dikerjakan','Selesai') DEFAULT 'Belum Dikerjakan',

    FOREIGN KEY (id_mahasiswa) REFERENCES mahasiswa(id_mahasiswa)
    ON DELETE CASCADE
);


-- ==========================================
-- TABLE LAPORAN
-- ==========================================

CREATE TABLE laporan (
    id_laporan INT AUTO_INCREMENT PRIMARY KEY,
    id_mahasiswa INT,
    nama_laporan VARCHAR(150) NOT NULL,
    periode VARCHAR(50),
    file_laporan VARCHAR(255),
    tanggal_upload DATE,

    FOREIGN KEY (id_mahasiswa) REFERENCES mahasiswa(id_mahasiswa)
    ON DELETE CASCADE
);


-- ==========================================
-- DATA LOGIN DEFAULT
-- ==========================================

INSERT INTO users 
(username, password, role)
VALUES
('admin', 'admin123', 'admin'),
('mahasiswa1', '123456', 'mahasiswa');


-- ==========================================
-- DATA MAHASISWA CONTOH
-- ==========================================

INSERT INTO mahasiswa
(id_user, nim, nama_mahasiswa, jurusan, perusahaan_magang, tanggal_mulai, tanggal_selesai)
VALUES
(2, '202612345', 'Nissa Fauziah', 'Teknik Informatika', 'PT Contoh Indonesia', '2026-01-10', '2026-03-10');


-- ==========================================
-- DATA TUGAS CONTOH
-- ==========================================

INSERT INTO tugas
(id_mahasiswa, judul_tugas, deskripsi, deadline, file_tugas, status)
VALUES
(1, 
'Laporan Minggu Pertama',
'Melakukan dokumentasi kegiatan magang minggu pertama',
'2026-01-17',
'laporan_minggu1.pdf',
'Selesai');


-- ==========================================
-- DATA LAPORAN CONTOH
-- ==========================================

INSERT INTO laporan
(id_mahasiswa, nama_laporan, periode, file_laporan, tanggal_upload)
VALUES
(1,
'Laporan Akhir Magang',
'Januari - Maret 2026',
'laporan_magang.pdf',
'2026-03-15');