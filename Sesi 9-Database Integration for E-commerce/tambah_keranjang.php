<?php
session_start();
require 'koneksi.php';

$id = $_GET['id'];

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

$query = mysqli_query($koneksi, "SELECT * FROM products WHERE id = '$id'");
$produk = mysqli_fetch_assoc($query);

$_SESSION['keranjang'][] = $produk;

header('Location: keranjang.php');
?>