<?php
include 'koneksi.php';

$id = $_GET['id'];

// SQL untuk mendapatkan data pegawai berdasarkan ID
$sql = "SELECT * FROM pegawai WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data pegawai tidak ditemukan";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
</head>
<body>
    <h2>Form Edit Data Pegawai</h2>
    <form method="POST" action="update_pegawai.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <!-- Tambahkan input hidden untuk menyimpan waktu sebelumnya -->
        <input type="hidden" name="waktu_edit" value="<?php echo $row['waktu_edit']; ?>">
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>

        <label for="posisi">Posisi:</label>
        <input type="text" id="posisi" name="posisi" value="<?php echo $row['posisi']; ?>" required><br><br>

        <label for="gaji">Gaji:</label>
        <input type="number" id="gaji" name="gaji" min="0" value="<?php echo $row['gaji']; ?>" required><br><br>

        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
    <br>
    <a href="index.php">Kembali ke Data Pegawai</a>
</body>
</html>
