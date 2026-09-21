<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body { background-color: #f4f6f9; }</style>
</head>
<body>
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h3 class="mb-4"><i class="bi bi-plus-circle"></i> Tambah Produk</h3>
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Produk</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Sembako">Sembako</option>
                    <option value="Perawatan">Perawatan</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success flex-grow-1">Tambah Produk</button>
                <a href="produk.php" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>