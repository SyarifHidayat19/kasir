<?php
    session_start();
    require_once "koneksi.php";

    function registerUser($conn, $username, $email, $password) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepared statement untuk insert data
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        
        if ($stmt->execute()) {
            return true; // Registrasi berhasil
        } else {
            return false; // Registrasi gagal
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validasi data
        if (empty($username) || empty($email) || empty($password)) {
            $error = "All fields are required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } elseif (strlen($password) < 8) {
            $error = "Password must be at least 8 characters long.";
        } else {
            // Periksa apakah email sudah terdaftar
            $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "Email already exists.";
            } else {
                // Panggil fungsi registerUser untuk menambahkan pengguna baru
                if (registerUser($conn, $username, $email, $password)) {
                    // Set pesan sukses ke sesi
                    $_SESSION['message'] = "Registration successful. You can now log in.";
                    // Redirect ke halaman login
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Error registering user. Please try again later.";
                }
            }
        }
    }
    ?>

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
                                        <div class="text-center mb-3">
                                            <img src="images/brio.png" alt="" style="width: 200px; height: auto;">
                                        </div>
                                        <h4 class="text-center mb-4">Daftar Disini</h4>
                                        <form action="login.php" method="post">
                                        <div class="container">
                                            <form action="daftar.php" method="post">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                                            </form>
                                            <div class="text-center mt-2">
                                                Already have an account? <a href="login.php">Login here</a>.
                                            </div>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p><a class="text-primary" href="login.php">Already have an account? Sign in</a></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/styleSwitcher.js"></script>
    </body>
</html>
