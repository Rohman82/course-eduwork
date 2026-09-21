<?php
require 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM products WHERE id = '$id'");

if ($query) {
    header('Location: produk.php');
} else {
    echo "Gagal menghapus produk: " . mysqli_error($koneksi);
}
?>