<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e7e7e7;
        }
        .header .title {
            font-size: 24px;
            font-weight: bold;
        }
        .sub-header {
            padding: 20px;
            background-color: #f1f1f1;
            display: flex;
            justify-content: space-around;
            border-bottom: 1px solid #e7e7e7;
        }
        .sub-header a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: background-color 0.3s, color 0.3s;
        }
        .sub-header a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .product-list {
            padding: 20px;
        }
        .product {
            border: 1px solid #e7e7e7;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .product img {
            max-width: 100px;
            margin-right: 20px;
        }
        .product .details {
            flex-grow: 1;
        }
        .product .details h5 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .product .details .price {
            font-size: 18px;
            color: #28a745;
        }
        .btn-back {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .media-list {
            list-style-type: none;
            padding: 0;
        }
        .media-list .media {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #e7e7e7;
            border-radius: 5px;
            background-color: #fff;
        }
        .media img {
            max-width: 100px;
            margin-right: 20px;
            border-radius: 5px;
        }
        .media-body {
            flex: 1;
        }
        .media-body h5 {
            margin-top: 0;
            margin-bottom: 5px;
            font-size: 18px;
        }
        .media-body p {
            margin: 0;
            font-size: 16px;
            color: #666;
        }
        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffc107;
            color: #fff;
            border: none;
            padding: 15px 20px;
            border-radius: 50%;
            font-size: 24px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .floating-button:hover {
            background-color: #ffc107;
        }
    </style>
<body>
<div class="header">
        <a href="menu.php" class="btn-back">Kembali</a>
        <div class="title">Produk</div>
        <a href="form_tambah_produk.php">Tamah Produk</a>
    </div>

    <div class="sub-header">
        <a href="#" onclick="showSection('produk')">Produk</a>
        <a href="#" onclick="showSection('kategori')">Kategori</a>
        <a href="#" onclick="showSection('jenis_penjualan')">Jenis Penjualan</a>
    </div>
    <div class="content-section" id="produk">
        <!-- Konten produk -->
        <?php include 'daftar_produk.php'; ?>
    </div>

    <div class="content-section" id="kategori">
        <?php include 'daftar_kategori.php'; ?>
        <!-- Konten kategori -->
    </div>

    <div class="content-section" id="jenis_penjualan">
        <?php include 'daftar_jenis_penjualan.php'; ?>
        <!-- Konten jenis penjualan -->
    </div>

    <!-- Daftar Produk -->
    


    <script>
        function showSection(sectionId) {
            var sections = document.querySelectorAll('.content-section');
            sections.forEach(function(section) {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
        function showFormTambahProduk() {
            window.location.href = 'form_tambah_produk.php';
        }
         // Menampilkan daftar produk secara default
         showSection('produk');
    </script>
</body>
</html>
