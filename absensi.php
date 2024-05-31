<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:title" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:description" content="Zenix - Crypto Admin Dashboard">
	<meta name="format-detection" content="telephone=no">
    <title>magang </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/brio.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">absensi pegawai 2024 01 mei 2024</h4>
                                    <p>pilih nama untuk absen dan pin</p>
                                    <form id="loginForm">
                                        <div class="form-group">
                                            <label for="sel1">nama</label>
                                            <select class="form-control default-select" id="sel1" onchange="showPinInput()">
                                                <option>pilih</option>
                                                <option>owner</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="pinInput" style="display: none;">
                                            <label for="pin">Nomor PIN</label>
                                            <input type="password" class="form-control" id="pin" placeholder="Masukkan PIN" required>
                                        </div>
                                        <div class="text-center" id="loginButton" style="display: none;">
                                            <button type="button" class="btn btn-primary btn-block" onclick="validatePin()">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script>
        function showPinInput() {
            var selectBox = document.getElementById("sel1");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            var pinInput = document.getElementById("pinInput");
            var loginButton = document.getElementById("loginButton");
    
            if (selectedValue === "owner") {
                pinInput.style.display = "block";
                loginButton.style.display = "block";
            } else {
                pinInput.style.display = "none";
                loginButton.style.display = "none";
            }
        }
    
        function validatePin() {
            var pin = document.getElementById("pin").value;
    
            // Lakukan validasi nomor PIN di sini
            // Misalnya, jika PIN benar, maka pindahkan pengguna ke halaman menu.html
            // Menggunakan window.location.href
            // Contoh:
            if (pin === "1234") {
                window.location.href = "menu.html";
            } else {
                alert("Nomor PIN salah. Coba lagi.");
            }
        }
    </script>
    
</body>
</html>