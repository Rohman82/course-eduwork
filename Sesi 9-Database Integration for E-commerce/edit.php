<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM products WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body { background-color: #f4f6f9; }</style>
</head>
<body>
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h3 class="mb-4"><i class="bi bi-pencil-square"></i> Edit Produk</h3>

        <?php if (!empty($row['gambar'])) { ?>
            <img src="uploads/<?= $row['gambar'] ?>" class="rounded mb-3" style="height:150px; object-fit:cover;">
        <?php } ?>

        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="<?= $row['nama_produk'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea name="deskripsi" class="form-control" rows="3" required><?= $row['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Produk</label>
                <input type="number" name="harga" class="form-control" value="<?= $row['harga'] ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="Sembako" <?= $row['kategori'] == 'Sembako' ? 'selected' : '' ?>>Sembako</option>
                    <option value="Perawatan" <?= $row['kategori'] == 'Perawatan' ? 'selected' : '' ?>>Perawatan</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Gambar Produk</label><br>
                <?php if (!empty($row['gambar'])) { ?>
                    <img src="uploads/<?= $row['gambar'] ?>" class="rounded mb-2" style="height:100px; object-fit:cover;"><br>
                <?php } ?>
                <input type="file" name="gambar" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">Simpan Perubahan</button>
                <a href="produk.php" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>