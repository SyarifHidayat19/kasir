<?php
include 'koneksi.php';

$id = $_GET['id'];

// SQL untuk menghapus data pegawai berdasarkan ID
$sql = "DELETE FROM pegawai WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
