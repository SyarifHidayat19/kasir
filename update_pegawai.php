<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$gaji = $_POST['gaji'];

// Mendapatkan nilai lama dari database untuk dibandingkan
$sql_select_old = "SELECT nama, posisi, gaji FROM pegawai WHERE id=$id";
$result_old = $conn->query($sql_select_old);

if ($result_old->num_rows > 0) {
    $row_old = $result_old->fetch_assoc();

    // Membandingkan nilai baru dengan nilai lama
    if ($nama != $row_old['nama'] || $posisi != $row_old['posisi'] || $gaji != $row_old['gaji']) {
        // Hanya memperbarui kolom yang berbeda
        $sql_update = "UPDATE pegawai SET ";
        $updates = array();

        if ($nama != $row_old['nama']) {
            $updates[] = "nama='$nama'";
        }

        if ($posisi != $row_old['posisi']) {
            $updates[] = "posisi='$posisi'";
        }

        if ($gaji != $row_old['gaji']) {
            $updates[] = "gaji=$gaji";
        }

        $sql_update .= implode(', ', $updates);
        $sql_update .= " WHERE id=$id";

        if ($conn->query($sql_update) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Jika tidak ada perubahan, langsung kembali ke halaman utama
        header("Location: index.php");
    }
} else {
    echo "Data pegawai tidak ditemukan";
}

$conn->close();
?>
