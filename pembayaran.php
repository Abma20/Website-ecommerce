<?php
// Langkah 1: Sertakan autoloader dari Composer
require_once 'vendor/autoload.php';

// Ambil data dari form sebelumnya dengan aman
$product_name = $_POST['product_name'] ?? 'Produk Tidak Dikenal';
$customer_name = $_POST['nama'] ?? 'Pelanggan';
$customer_address = $_POST['alamat'] ?? '-';
$jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 1;
$ukuran_ml = isset($_POST['ukuran']) ? (int)$_POST['ukuran'] : 0;

// Hitung total harga
$harga_per_ml = 2000;
$total_harga = $harga_per_ml * $ukuran_ml * $jumlah;

// ==================================================================
// KESALAHAN UTAMA DI SINI: PASTIKAN MENGGUNAKAN KUNCI SANDBOX
// Kunci Sandbox selalu diawali dengan "SB-Mid-..."
// ==================================================================

// Langkah 2: Konfigurasi Midtrans dengan Kunci API SANDBOX Anda
\Midtrans\Config::$serverKey = 'Mid-server-7erVnsYXBqVzohIwkxlB5Yh9'; // Contoh: SB-Mid-server-xxxxxxxx
\Midtrans\Config::$isProduction = false; // BENAR! Tetap false untuk testing
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Buat parameter transaksi untuk Midtrans
$params = array(
    'transaction_details' => array(
        'order_id' => 'ORDER-' . time() . rand(), // ID order harus unik
        'gross_amount' => $total_harga,
    ),
    'item_details' => array(
        array(
            'id'       => 'PARFUM-01',
            'price'    => $total_harga,
            'quantity' => 1,
            'name'     => "$product_name {$ukuran_ml}ml (x{$jumlah})"
        )
    ),
    'customer_details' => array(
        'first_name' => $customer_name,
        'address'    => $customer_address
    ),
);

// Dapatkan Snap Token dari Midtrans
try {
    $snapToken = \Midtrans\Snap::getSnapToken($params);
} catch (Exception $e) {
    // Tangani error jika terjadi, ini akan menampilkan pesan error yang lebih jelas
    die('Error saat membuat token Midtrans: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran - DanisParfume</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="Mid-client-unn2tzmtZvdGsIll"></script> <style>
        body { font-family: 'Poppins', sans-serif; background-color: #1a1a1a; color: #f0f0f0; min-height: 100vh; display: flex; flex-direction: column; }
        .navbar, .footer { background-color: #dc3545; }
        .navbar-brand { display: flex; align-items: center; font-weight: 700; }
        .navbar-brand img { height: 35px; margin-right: 10px; border-radius: 50%; border: 2px solid white; }
        .navbar-brand, .navbar-nav .nav-link { color: white !important; }
        .navbar-toggler-icon { background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E"); }
        .content-wrap { flex: 1; }
        .payment-container { background-color: #2b2b2b; border-radius: 10px; padding: 40px; margin-top: 40px; margin-bottom: 40px; border: 1px solid #444; }
        .summary-title { font-weight: 700; color: white; border-bottom: 1px solid #444; padding-bottom: 15px; margin-bottom: 20px;}
        .btn-pay { background-color: #28a745; border-color: #28a745; font-weight: bold; width: 100%; padding: 12px; font-size: 1.2rem; }
        .btn-pay:hover { background-color: #218838; border-color: #1e7e34; }
        .footer { color: white; padding: 15px 0; text-align: center; }
    </style>
</head>
<body>
<div class="content-wrap">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/Logo1.jpg" alt="Logo Danis Parfume">
                Danis Parfume
            </a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="toko.php">Toko</a></li>
                    <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="payment-container">
            <h2 class="summary-title">Ringkasan Pesanan</h2>
            <div class="row">
                <div class="col-8">
                    <p>Produk:</p>
                    <p>Jumlah:</p>
                    <p>Ukuran:</p>
                    <p>Nama Pemesan:</p>
                    <p>Alamat Pengiriman:</p>
                    <h4 class="mt-3">Total Pembayaran:</h4>
                </div>
                <div class="col-4 text-right">
                    <p><strong><?= htmlspecialchars($product_name) ?></strong></p>
                    <p><strong><?= $jumlah ?> botol</strong></p>
                    <p><strong><?= $ukuran_ml ?> ml</strong></p>
                    <p><strong><?= htmlspecialchars($customer_name) ?></strong></p>
                    <p><strong><?= htmlspecialchars($customer_address) ?></strong></p>
                    <h4 class="mt-3" style="color: #dc3545;">Rp <?= number_format($total_harga, 0, ',', '.') ?></h4>
                </div>
            </div>
            <hr style="border-top: 1px solid #444;">
            <button id="pay-button" class="btn btn-pay mt-3">Bayar Sekarang</button>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <span>©2025 DanisParfum website by majid</span>
    </div>
</footer>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Panggil Snap.js untuk membuka pop-up pembayaran
      snap.pay('<?= $snapToken ?>', {
          onSuccess: function(result){
            /* Tindakan jika pembayaran sukses. Redirect ke halaman terima kasih */
            console.log(result);
            window.location.href = 'halaman_sukses.php?order_id=' + result.order_id;
          },
          onPending: function(result){
            /* Tindakan jika pembayaran pending (misal: transfer bank) */
            console.log(result);
            alert("Pembayaran Anda sedang menunggu. Silakan selesaikan sesuai instruksi.");
          },
          onError: function(result){
            /* Tindakan jika pembayaran gagal */
            console.log(result);
            alert("Pembayaran gagal!");
          },
          onClose: function(){
            /* Tindakan jika pop-up ditutup sebelum selesai */
            alert('Anda menutup jendela pembayaran sebelum menyelesaikan transaksi.');
          }
      });
    });
</script>

</body>
</html>