<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Data Pegawai</title>
</head>
<body>
    <h2>Data Pegawai</h2>
    <a href="tambah_pegawai.php">Tambah Data Pegawai</a>
    <br><br>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Gaji</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';

        // SQL untuk mendapatkan data pegawai dari database
        $sql = "SELECT * FROM pegawai";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["posisi"] . "</td>";
                echo "<td>" . $row["gaji"] . "</td>";
                echo "<td><a href='edit_pegawai.php?id=" . $row["id"] . "'>Edit</a> | <a href='hapus_pegawai.php?id=" . $row["id"] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data pegawai</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
