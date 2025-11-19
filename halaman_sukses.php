<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Sukses</title>
</head>
<body>
    <h1>Terima Kasih!</h1>
    <p>Pembayaran Anda untuk pesanan dengan ID: <?= htmlspecialchars($_GET['order_id']) ?> telah berhasil.</p>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>