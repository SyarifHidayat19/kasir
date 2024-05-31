<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="my-4">Update Produk</h2>

    <?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM produk WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <form action="update_produk_action.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" value="<?php echo $row['nama_produk']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" class="form-control" name="gambar_produk">
                    <img src="uploads/<?php echo $row['gambar_produk']; ?>" width="100">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="makanan" <?php echo $row['kategori_id'] == 'makanan' ? 'selected' : ''; ?>>Makanan</option>
                        <option value="minuman" <?php echo $row['kategori_id'] == 'minuman' ? 'selected' : ''; ?>>Minuman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis Penjualan</label>
                    <select name="jenis_penjualan" class="form-control">
                        <option value="eceran" <?php echo $row['jenis_penjualan_id'] == 'eceran' ? 'selected' : ''; ?>>Eceran</option>
                        <option value="grosir" <?php echo $row['jenis_penjualan_id'] == 'grosir' ? 'selected' : ''; ?>>Grosir</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="close" class="btn btn-back btn-primary">Batal</button>
            </form>

            <?php
        } else {
            echo "<p>Produk tidak ditemukan.</p>";
        }
    } else {
        echo "<p>ID produk tidak diberikan.</p>";
    }

    $conn->close();
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
