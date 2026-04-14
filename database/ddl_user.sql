-- Membuat database
CREATE DATABASE db_buah;

-- Menggunakan database
USE db_buah;

-- Membuat tabel dengan 3 kolom
CREATE TABLE buah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_buah VARCHAR(50),
    warna VARCHAR(30)
);