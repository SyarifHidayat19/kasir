<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<div class="container">
    <h2 class="my-4">Daftar Produk</h2>
    <div class="media-list">
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM produk";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="media-list">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="media" onclick="window.location.href=\'mode_pesanan.php?id=' . $row["id"] . '&nama_produk=' . urlencode($row["nama_produk"]) . '&harga=' . $row["harga"] . '\'">';
                echo '<img src="uploads/' . $row["gambar_produk"] . '" width="100" class="mr-3">';
                echo '<div class="media-body">';
                echo '<h5 class="mt-0">' . $row["nama_produk"] . '</h5>';
                echo '<p>Harga: ' . $row["harga"] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "Tidak ada produk.";
        }
        $conn->close();
        ?>
        
    </div>
</div>
<script>
function goToPesanan(id, nama, harga) {
    // Membuat URL untuk mengirim data produk ke mode_pesanan.php
    const url = `mode_pesanan.php?id=${produk}&nama_produk=${encodeURIComponent(nama)}&harga=${harga}`;
    window.location.href = url;
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>