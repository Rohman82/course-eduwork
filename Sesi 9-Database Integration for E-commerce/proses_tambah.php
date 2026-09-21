<?php
require 'koneksi.php';

$nama = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

$namaGambar = $_FILES['gambar']['name'];
$tmpGambar = $_FILES['gambar']['tmp_name'];
$folderTujuan = 'uploads/' . $namaGambar;

move_uploaded_file($tmpGambar, $folderTujuan);

$query = mysqli_query($koneksi, "INSERT INTO products (nama_produk, deskripsi, harga, kategori, gambar) 
    VALUES ('$nama', '$deskripsi', '$harga', '$kategori', '$namaGambar')");

if ($query) {
    header('Location: produk.php');
} else {
    echo "Gagal menyimpan produk: " . mysqli_error($koneksi);
}
?>