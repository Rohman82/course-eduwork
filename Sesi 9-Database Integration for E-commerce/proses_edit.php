<?php
require 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$gambarLama = $_POST['gambar_lama'];

if (!empty($_FILES['gambar']['name'])) {
    $namaGambar = $_FILES['gambar']['name'];
    $tmpGambar = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmpGambar, 'uploads/' . $namaGambar);
} else {
    $namaGambar = $gambarLama;
}

$query = mysqli_query($koneksi, "UPDATE products SET 
    nama_produk = '$nama', 
    deskripsi = '$deskripsi', 
    harga = '$harga', 
    kategori = '$kategori',
    gambar = '$namaGambar'
    WHERE id = '$id'");

if ($query) {
    header('Location: produk.php');
} else {
    echo "Gagal mengubah produk: " . mysqli_error($koneksi);
}
?>