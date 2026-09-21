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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f4f6f9; }
        .product-card { border: none; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); transition: transform 0.15s ease; overflow: hidden; }
        .product-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .product-img { height: 180px; object-fit: cover; background: #e9ecef; }
        .price-tag { color: #198754; font-weight: 700; font-size: 1.1rem; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand mb-0 h1"><i class="bi bi-shop"></i> Daftar Produk</span>
        <a href="keranjang.php" class="btn btn-outline-light"><i class="bi bi-cart3"></i> Keranjang</a>
    </div>
</nav>

<div class="container pb-5">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div class="btn-group">
            <a href="produk.php" class="btn btn-outline-primary">Semua</a>
            <a href="produk.php?kategori=Sembako" class="btn btn-outline-primary">Sembako</a>
            <a href="produk.php?kategori=Perawatan" class="btn btn-outline-primary">Perawatan</a>
        </div>
        <a href="tambah.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
    </div>

    <div class="row g-4">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <div class="col-md-4">
            <div class="card product-card h-100">
                <?php if (!empty($row['gambar'])) { ?>
                    <img src="uploads/<?= $row['gambar'] ?>" class="product-img w-100">
                <?php } else { ?>
                    <div class="product-img d-flex align-items-center justify-content-center text-muted">
                        <i class="bi bi-image fs-1"></i>
                    </div>
                <?php } ?>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary-subtle text-dark mb-2 align-self-start"><?= $row['kategori'] ?></span>
                    <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                    <p class="card-text text-muted small flex-grow-1"><?= $row['deskripsi'] ?></p>
                    <p class="price-tag mb-3">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
                    <div class="d-flex gap-2">
                        <a href="tambah_keranjang.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm flex-grow-1"><i class="bi bi-cart-plus"></i> Keranjang</a>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin mau hapus produk ini?')"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>