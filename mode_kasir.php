<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mode Kasir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
        .btn-back {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        
        .btn-transparent {
            background-color: transparent;
            border: none;
            color: #000;
        }
        .btn-transparent:hover {
            color: #007bff;
        }
        .fixed-bottom-button {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }
    </style>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="menu.php" class="btn-back">Kembali</a>
                <a class="navbar-brand" href="#">Nama Pelanggan</a>
                <a class="btn-nota">
                    <button class="btn btn-primary"><i class="fas fa-receipt"></i> Nota Tersimpan</button>
                </a>
            </nav>
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="btn btn-transparent"><i class="fas fa-save"></i> Simpan</button>
                    <button class="btn btn-transparent"><i class="fas fa-print"></i> Cetak</button>
                    <button class="btn btn-transparent"><i class="fas fa-user"></i> Pelanggan</button>
                    <button class="btn btn-transparent"><i class="fas fa-receipt"></i> Pisah Nota</button>
                    <button class="btn btn-transparent"><i class="fas fa-ellipsis-h"></i> Lainnya</button>
                    <button class="btn btn-transparent"><i class="fas fa-trash"></i> Hapus</button>
            </div>
        </div>
    </div>

    <!-- list pesanan -->
    <div class="container mt-4">
        <h2>Keranjang</h2>

        <?php if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0): ?>
            <ul class="list-group mb-4">
                <?php
                $total = 0;
                foreach ($_SESSION['keranjang'] as $item):
                    $subtotal = $item['harga'] * $item['jumlah'];
                    $total += $subtotal;
                ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="my-0"><?php echo htmlspecialchars($item['nama_produk']); ?></h5>
                            <small class="text-muted">Jumlah: <?php echo $item['jumlah']; ?></small>
                        </div>
                        <span class="text-muted">Rp <?php echo number_format($subtotal, 2, ',', '.'); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="d-flex justify-content-between">
                <h5>Subtotal</h5>
                <h5>Rp <?php echo number_format($total, 2, ',', '.'); ?></h5>
            </div>
        <?php else: ?>
            <p>Keranjang kosong.</p>
        <?php endif; ?>

        <div class="mt-4">
            <a href="kasir.php" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>
    <div class="fixed-bottom-button">
        <a href="pembayaran.php" class="btn btn-success"><i class="fas fa-credit-card"></i> Proses Pembayaran</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
