

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .header-left {
            padding: center;
            
        }
        .fixed-add-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffcc00;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .fixed-add-button:hover {
            background-color: #ffaa00;
        }
        .hidden {
            display: none;
        }
        .media-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .media {
            cursor: pointer;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .media img {
            border-radius: 5px;
        }
        .hidden {
            display: none;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .product {
            cursor: pointer;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product img {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="main-wrapper">
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <a href="menu.php" class="btn-back">Kembali</a>
                        <div class="header-left">
                            <h3 class="m-0" style="font-size: 2rem;">Kasir</h3>
                        </div>
                    </div>
                </nav>
                <div class="sub-header d-flex justify-content-between">
                    <a href="#" class="text-decoration-none" onclick="showSection('favorit')">
                        <div class="d-flex align-items-center flex-wrap mr-auto">
                            <h5 class="dashboard_bar">Favorit</h5>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none" onclick="showSection('kategori')">
                        <div class="d-flex align-items-center flex-wrap mr-auto">
                            <h5 class="dashboard_bar">Kategori</h5>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none" onclick="showSection('produk')">
                        <div class="d-flex align-items-center flex-wrap mr-auto">
                            <h5 class="dashboard_bar">Produk</h5>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none" onclick="showSection('jenis_penjualan')">
                        <div class="d-flex align-items-center flex-wrap mr-auto">
                            <h5 class="dashboard_bar">Lainnya</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 content-section hidden" id="favorit">
            <?php include 'daftar_favorit.php'; ?>
            <!-- Konten Favorit di sini -->
        </div>
        <div class="col-12 content-section hidden" id="kategori">
            <?php include 'daftar_kategori.php'; ?>
            <!-- Konten Kategori di sini -->
        </div>
        <div class="col-12 content-section hidden" id="produk">
            <div class="product-list">
                <?php include 'daftar_produk_kasir.php'; ?>
            </div>
            <!-- Konten Produk di sini -->
        </div>
        <div class="col-12 content-section hidden" id="lainnya">
            <?php include 'pesanan.php'; ?>
            <!-- Konten Lainnya di sini -->
        </div>
        

        <!-- Tombol Kasir -->
        <button class="fixed-add-button" onclick="window.location.href='mode_kasir.php'">
            <i class="fas fa-plus"></i>
        </button>

        <!-- Footer -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed & Developed by <a href="../index.htm" target="_blank">Dayat Store</a> 2024</p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="vendor/owl-carousel/owl.carousel.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script>
        function redirectToModePesanan(produkId) {
        window.location.href = 'mode_pesanan.php?produk_id=' + produkId;
        }
        function showSection(section) {
            // Sembunyikan semua elemen
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.add('hidden');
            }

            // Tampilkan elemen yang diklik
            document.getElementById(section).classList.remove('hidden');
        }

        // Tampilkan elemen produk secara default
        document.addEventListener('DOMContentLoaded', function () {
            showSection('produk');
        });
    </script>
</body>

</html>
