<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'ikan_toko';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Tidak dapat terhubung ke database. Silakan periksa konfigurasi.");
}
$product_id = null;
$product_name = '';
$product = null;

if (isset($_GET['product'])) {
    $product_name = $_GET['product'];
    
    $stmt = $pdo->prepare('SELECT id, nama, harga, deskripsi, gambar FROM produk WHERE nama = :nama');
    $stmt->execute(['nama' => $product_name]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        $product_id = $product['id'];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli <?= htmlspecialchars($product_name) ?> - DanisParfume</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* (Seluruh CSS tema merah & hitam Anda tetap di sini) */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar, .footer { background-color: #dc3545; }
        .navbar-brand, .navbar-nav .nav-link { color: white !important; }
        .navbar-toggler-icon { background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E"); }
        .content-wrap { flex: 1; }
        .purchase-container { background-color: #2b2b2b; border-radius: 10px; padding: 40px; margin-top: 40px; margin-bottom: 40px; border: 1px solid #444; }
        .product-image { max-width: 100%; border-radius: 8px; border: 2px solid #444; }
        .product-title { font-weight: 700; color: white; }
        .product-description { color: #ccc; white-space: pre-wrap; word-wrap: break-word; }
        .product-price { color: #dc3545; font-size: 1.2rem; font-weight: bold; }
        .form-control { background-color: #3d3d3d; color: #f0f0f0; border: 1px solid #555; }
        .form-control:focus { background-color: #4a4a4a; color: #f0f0f0; border-color: #dc3545; box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); }
        .form-control::placeholder { color: #aaa; }
        
        /* CSS BARU UNTUK DUA TOMBOL */
        .button-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Dua kolom dengan lebar sama */
            gap: 15px; /* Jarak antar tombol */
        }
        .btn-action {
            font-weight: bold;
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            transition: all 0.2s;
        }
        .btn-action:hover {
            transform: translateY(-2px);
        }
        .btn-pay-direct {
            background-color: #28a745; /* Hijau untuk pembayaran langsung */
            border-color: #28a745;
        }
        .btn-pay-direct:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-pay-whatsapp {
            background-color: #17a2b8; /* Biru info untuk WhatsApp */
            border-color: #17a2b8;
        }
        .btn-pay-whatsapp:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        
        .footer { color: white; padding: 15px 0; text-align: center; }
    </style>
</head>
<body>

<div class="content-wrap">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Danis Parfume</a>
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
        <div class="purchase-container">
            <?php if ($product): ?>
                <div class="row">
                    <div class="col-lg-5 text-center text-lg-left mb-4 mb-lg-0">
                        <img src="uploads/<?= htmlspecialchars($product['gambar']) ?>" alt="<?= htmlspecialchars($product['nama']) ?>" class="product-image mb-4">
                        <h2 class="product-title"><?= htmlspecialchars($product['nama']) ?></h2>
                        <p class="product-description"><?= nl2br(htmlspecialchars($product['deskripsi'])) ?></p>
                        <p class="product-price">Harga per ml: Rp 2.000,-</p>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="mb-4">Form Pemesanan</h3>
                        
                        <form method="POST" action="pembayaran.php" id="order-form">
                            <input type="hidden" id="product_name" name="product_name" value="<?= htmlspecialchars($product['nama']) ?>">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ukuran">Pilih Ukuran (ml):</label>
                                    <select class="form-control" id="ukuran" name="ukuran" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="20">20 ml</option>
                                        <option value="25">25 ml</option>
                                        <option value="30">30 ml</option>
                                        <option value="35">35 ml</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jumlah">Jumlah Botol:</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1" required>
                                </div>
                            </div>
                            
                            <hr style="border-top: 1px solid #444;">
                            <h4 class="mb-3 mt-4">Data Pengiriman</h4>
                            
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap:</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>

                            <div class="button-container mt-4">
                                <button type="button" id="whatsapp-button" class="btn btn-action btn-pay-whatsapp">Pesan via WhatsApp</button>
                                <button type="submit" class="btn btn-action btn-pay-direct">Pembayaran Langsung</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center">
                    <h2 class="product-title">Produk Tidak Ditemukan</h2>
                    <p class="product-description">Maaf, produk yang Anda cari tidak ada.</p>
                    <a href="toko.php" class="btn btn-submit">Kembali ke Toko</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <span>©2025 DanisParfum website by majid</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
document.getElementById('whatsapp-button').addEventListener('click', function() {
    // 1. Ambil semua data dari form
    const form = document.getElementById('order-form');
    const productName = document.getElementById('product_name').value;
    const ukuran = document.getElementById('ukuran').value;
    const jumlah = document.getElementById('jumlah').value;
    const nama = document.getElementById('nama').value;
    const alamat = document.getElementById('alamat').value;

    // 2. Validasi sederhana: pastikan semua field diisi
    if (!ukuran || !jumlah || !nama || !alamat) {
        alert('Harap lengkapi semua field sebelum memesan via WhatsApp.');
        return; // Hentikan proses jika ada field yang kosong
    }
    
    // 3. Hitung total harga (logika yang sama seperti di PHP)
    const hargaPerMl = 2000;
    const totalHarga = hargaPerMl * ukuran * jumlah;

    // Format harga ke dalam format Rupiah
    const formattedTotalHarga = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(totalHarga);

    // 4. Siapkan pesan untuk WhatsApp
    let message = `Halo, saya ingin memesan parfum:\n\n`;
    message += `- Nama parfum: ${productName}\n`;
    message += `- Ukuran: ${ukuran} ml\n`;
    message += `- Jumlah: ${jumlah} botol\n`;
    message += `- Total Harga: ${formattedTotalHarga}\n\n`;
    message += `FORM PEMBELIAN\n`;
    message += `- Nama: ${nama}\n`;
    message += `- Alamat: ${alamat}\n`;
    message += `- Pembayaran via COD/TF:`;

    // 5. Buat URL WhatsApp
    const whatsappNumber = '6285283254126'; // Nomor WA tujuan
    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

    // 6. Buka WhatsApp di tab baru
    window.open(whatsappUrl, '_blank');
});
</script>

</body>
</html>