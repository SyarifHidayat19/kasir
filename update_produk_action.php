<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori_id = $_POST['kategori'];
    $jenis_penjualan_id = $_POST['jenis_penjualan'];
    $gambar_produk = $_FILES['gambar_produk']['name'];

    if ($gambar_produk) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($gambar_produk);
        move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file);

        $sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', gambar_produk='$gambar_produk', kategori_id='$kategori_id', jenis_penjualan_id='$jenis_penjualan_id' WHERE id=$id";
    } else {
        $sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', kategori_id='$kategori_id', jenis_penjualan_id='$jenis_penjualan_id' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Produk berhasil diperbarui.";
        header("Location: produk.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
