<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $catatan = $_POST['catatan'];

    $sql = "SELECT * FROM produk WHERE nama_produk = '$nama_produk'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $produk = $result->fetch_assoc();

        // Tambahkan produk ke dalam session keranjang
        if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = array();
        }

        $item = array(
            'id' => $produk['id'],
            'nama_produk' => $produk['nama_produk'],
            'harga' => $produk['harga'],
            'jumlah' => $jumlah,
            'catatan' => $catatan
        );

        $_SESSION['keranjang'][] = $item;

        // Redirect kembali ke halaman kasir dengan pesan
        header("Location: kasir.php?message=Pesanan%20telah%20ditambahkan");
        exit();
    } else {
        echo "Produk tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        body {
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn {
            flex: 1;
            margin: 0 5px;
            padding: 10px 0;
            font-size: 16px;
        }
    </style>

<body>
    <div class="container">
        <h2>Tambah Pesanan</h2>
        <form action="mode_pesanan.php" method="POST">
            <div class="form-group">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" readonly>
            </div>
            <div class="form-group">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly>
            </div>
            <div class="form-group">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <div class="form-group">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan"></textarea>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
                <a href="kasir.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
<script>
        // Mendapatkan parameter URL untuk nama produk dan harga
        const urlParams = new URLSearchParams(window.location.search);
        const namaProduk = urlParams.get('nama_produk');
        const harga = urlParams.get('harga');

        // Mengisi nilai input form dengan nilai produk yang diklik
        document.getElementById("nama_produk").value = namaProduk;
        document.getElementById("harga").value = harga;
    </script>

</html>
