<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $gambar_produk = $_FILES['gambar_produk']['name'];
    $kategori_id = $_POST['kategori'];
    $jenis_penjualan_id = $_POST['jenis_penjualan'];

    // Proses upload gambar
    $target_dir = "uploads/";
    
    // Periksa apakah direktori uploads ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Buat direktori uploads jika tidak ada
    }

    $target_file = $target_dir . basename($gambar_produk);
    if (move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO produk (nama_produk, harga, gambar_produk, kategori_id, jenis_penjualan_id) 
                  VALUES ('$nama_produk', '$harga', '$gambar_produk', '$kategori_id', '$jenis_penjualan_id')";

        if ($conn->query($query) === TRUE) {
            header("Location: produk.php?message=Produk berhasil ditambahkan");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$conn->close();
?>
