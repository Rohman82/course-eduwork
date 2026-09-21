<?php
$koneksi = mysqli_connect("localhost", "root", "", "ecommerce");

if(!$koneksi){
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>