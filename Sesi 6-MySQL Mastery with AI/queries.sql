-- =========================================
-- Dokumentasi Query - Tugas Database E-Commerce
-- Database: ecommerce
-- =========================================

-- =========================================
-- 1. PEMBUATAN DATABASE & TABEL
-- =========================================

CREATE DATABASE ecommerce;
USE ecommerce;

-- Tabel products
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_produk VARCHAR(100),
    harga INT,
    deskripsi VARCHAR(250),
    stok INT
);

-- Tabel users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(100)
);

-- Tabel orders (dengan relasi FOREIGN KEY ke users & products)
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    quantity INT,
    total INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- =========================================
-- 2. QUERY CRUD - TABEL PRODUCTS
-- =========================================

-- CREATE: menambah data produk
INSERT INTO products (nama_produk, harga, deskripsi, stok)
VALUES
  ('Sabun Mandi', 10000, 'Sabun mandi kualitas terjamin', 50),
  ('Shampo Anti Ketombe', 15000, 'Shampo untuk rambut berketombe', 30),
  ('Pasta Gigi', 8000, 'Pasta gigi dengan kandungan fluoride untuk gigi lebih kuat', 40),
  ('Tisu Basah', 12000, 'Tisu basah antibakteri untuk kebersihan sehari-hari', 25);

-- READ: menampilkan semua data produk
SELECT * FROM products;

-- UPDATE: mengubah harga & stok produk dengan id = 1
UPDATE products
SET harga = 7000, stok = 30
WHERE id = 1;

-- Tambahan produk percobaan, khusus untuk didemokan di query DELETE
INSERT INTO products (nama_produk, harga, deskripsi, stok)
VALUES ('Produk Percobaan', 1000, 'Data percobaan untuk contoh query DELETE', 1);

-- DELETE: menghapus produk percobaan berdasarkan id
-- (sesuaikan angka id di bawah dengan id produk percobaan yang baru saja dibuat)
DELETE FROM products WHERE id IN (3,4);
