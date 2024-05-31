<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total = 0;
    if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0) {
        foreach ($_SESSION['keranjang'] as $item) {
            $subtotal = $item['harga'] * $item['jumlah'];
            $total += $subtotal;
        }
    }

    $bayar = $_POST['bayar'];
    $kembalian = $bayar - $total;

    // Hapus keranjang setelah pembayaran
    unset($_SESSION['keranjang']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Selesai</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .message {
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Pembayaran Selesai</h2>

        <div class="message mb-4">
            <?php
            if ($kembalian > 0) {
                echo "Terima kasih! Pembayaran Anda berhasil. Kembalian: Rp " . number_format($kembalian, 2, ',', '.');
            } elseif ($kembalian == 0) {
                echo "Terima kasih! Pembayaran Anda pas.";
            } else {
                echo "Uang yang diberikan kurang. Silakan coba lagi.";
            }
            ?>
        </div>

        <?php if ($kembalian >= 0): ?>
        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Nota</button>
        <?php endif; ?>
        <button class="btn btn-secondary" onclick="window.location.href='mode_kasir.php'">Close</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="notaModal" tabindex="-1" aria-labelledby="notaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notaModalLabel">Cetak Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.href='kasir.php'">close
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 type="button" class="btn btn-secondary" onclick="window.location.href='kasir.php'">Close</h2>
                </div>
                <div class="modal-body">
                    Pilih tindakan yang ingin Anda lakukan:
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  onclick="window.location.href='mode_kasir.php'">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="printNota()">Print</button>
                    <button type="button" class="btn btn-success" onclick="saveNota()">Simpan Nota</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printNota() {
            // Fungsi untuk print nota
            window.print();
             // Arahkan ke halaman kasir setelah mencetak
             window.location.href = 'kasir.php';
        }

        function saveNota() {
            // Fungsi untuk menyimpan nota
            alert('Fitur simpan nota belum diimplementasikan.');
            // Implementasikan fungsi simpan nota sesuai kebutuhan Anda
            window.location.href = 'kasir.php';
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
