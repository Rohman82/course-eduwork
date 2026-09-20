<?php
$namaProduk = $_POST['nama'];
$hargaProduk = $_POST['harga'];
if (empty($namaProduk) || empty($hargaProduk)) {
    echo "Nama produk dan harga produk harus diisi.";
} else {
    echo "Produk $namaProduk dengan harga $hargaProduk berhasil disimpan.";
}
?>