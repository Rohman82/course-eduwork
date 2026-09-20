<?php
require 'koneksi.php';

if (isset($_GET['kategori']) && $_GET['kategori'] != '') {
    $kategori = $_GET['kategori'];
    $query = mysqli_query($koneksi, "SELECT * FROM products WHERE kategori = '$kategori'");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM products");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    <a href="produk.php">Semua</a> |
    <a href="produk.php?kategori=Sembako">Sembako</a> |
    <a href="produk.php?kategori=Perawatan">Perawatan</a>

    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <div>
            <h3><?= $row['nama_produk'] ?></h3>
            <p>Harga: Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
            <p><?= $row['deskripsi'] ?></p>
        </div>
        <hr>
    <?php } ?>
</body>
</html>