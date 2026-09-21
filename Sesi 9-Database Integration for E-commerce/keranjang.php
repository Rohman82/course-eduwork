<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>body { background-color: #f4f6f9; }</style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand mb-0 h1"><i class="bi bi-cart3"></i> Keranjang Belanja</span>
        <a href="produk.php" class="btn btn-outline-light"><i class="bi bi-arrow-left"></i> Kembali Belanja</a>
    </div>
</nav>

<div class="container pb-5" style="max-width: 700px;">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <?php
        $total = 0;
        if (!empty($_SESSION['keranjang'])) {
            foreach ($_SESSION['keranjang'] as $index => $item) {
        ?>
        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
            <div>
                <h6 class="mb-0"><?= $item['nama_produk'] ?></h6>
                <small class="text-muted"><?= $item['kategori'] ?></small>
            </div>
            <div class="d-flex align-items-center gap-3">
              <span class="fw-bold text-success">Rp<?= number_format($item['harga'], 0, ',', '.') ?></span>
              <a href="hapus_keranjang.php?index=<?= $index ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus item ini dari keranjang?')">
                  <i class="bi bi-trash"></i>
              </a>
            </div>
        </div>
        <?php
            $total += $item['harga'];
            }
        } else {
            echo '<p class="text-muted text-center py-4">Keranjang masih kosong.</p>';
        }
        ?>

        <div class="d-flex justify-content-between align-items-center pt-4">
            <h5 class="mb-0">Total</h5>
            <h5 class="mb-0 text-success">Rp<?= number_format($total, 0, ',', '.') ?></h5>
        </div>
    </div>
    <?php if (!empty($_SESSION['keranjang'])) { ?>
<div class="text-end mt-3">
    <a href="kosongkan_keranjang.php" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Kosongkan semua keranjang?')">Kosongkan Keranjang</a>
</div>
<?php } ?>
</div>
</body>
</html>