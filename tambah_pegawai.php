<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>
</head>
<body>
    <h2>Form Tambah Data Pegawai</h2>
    <form method="POST" action="simpan_pegawai.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="posisi">Posisi:</label>
        <input type="text" id="posisi" name="posisi" required><br><br>

        <label for="gaji">Gaji:</label>
        <input type="number" id="gaji" name="gaji" min="0" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>
    <br>
    <a href="index.php">Kembali ke Data Pegawai</a>
</body>
</html>
