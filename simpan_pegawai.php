<?php
include 'koneksi.php';

// Ambil data dari formulir
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$gaji = $_POST['gaji'];

// SQL untuk menyimpan data ke dalam tabel pegawai
$sql = "INSERT INTO pegawai (nama, posisi, gaji) VALUES ('$nama', '$posisi', $gaji)";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
