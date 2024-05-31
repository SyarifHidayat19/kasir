
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

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='media'>

                        <img src='uploads/" . $row["gambar_produk"] . "' class='align-self-start mr-3'>
                        <div class='media-body'>
                            <h5 class='mt-0'><a href='update_produk.php?id=" . $row["id"] . "'>" . $row["nama_produk"] . "</h5>
                        </div>
                        <div>Rp " . number_format($row["harga"], 0, ',', '.') . "</div>
                      </div>";
            }
        } else {
            echo "<p>Tidak ada produk.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>