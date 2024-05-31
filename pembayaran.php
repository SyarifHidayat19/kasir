<?php
session_start();
$total = 0;
if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0) {
    foreach ($_SESSION['keranjang'] as $item) {
        $subtotal = $item['harga'] * $item['jumlah'];
        $total += $subtotal;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pembayaran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .total-amount {
            font-weight: bold;
            font-size: 1.5em;
        }
        .payment-methods button {
            margin-right: 10px;
        }
        .payment-options button {
            margin: 5px;
        }
        .fixed-bottom-button {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Proses Pembayaran</h2>

        <div class="total-amount mb-4">
            Total: <span>Rp <?php echo number_format($total, 2, ',', '.'); ?></span>
        </div>

        <div class="payment-methods mb-4">
            <h5>Metode Pembayaran:</h5>
            <button class="btn btn-outline-primary">Tunai</button>
            <button class="btn btn-outline-primary">Debit</button>
        </div>

        <form action="selesai_pembayaran.php" method="POST">
            <div class="form-group">
                <label for="bayar">Bayar:</label>
                <input type="number" class="form-control" id="bayar" name="bayar" required>
            </div>

            <div class="payment-options mb-4">
                <button type="button" class="btn btn-outline-secondary" onclick="setPayment(50000)">Rp 50.000</button>
                <button type="button" class="btn btn-outline-secondary" onclick="setPayment(100000)">Rp 100.000</button>
                <button type="button" class="btn btn-outline-secondary" onclick="setPayment(200000)">Rp 200.000</button>
                <button type="button" class="btn btn-outline-secondary" onclick="setPayment(500000)">Rp 500.000</button>
            </div>

            <div class="fixed-bottom-button">
                <button type="submit" class="btn btn-success"><i class="fas fa-money-bill-wave"></i> Bayar</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='kasir.php'">Close</button>
            </div>
        </form>
    </div>

    <script>
        function setPayment(amount) {
            document.getElementById('bayar').value = amount;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
