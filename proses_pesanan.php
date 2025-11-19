<?php
// Koneksi ke database
$host = 'localhost'; // atau alamat server database Anda
$dbname = 'ikan_toko';
$username = 'root'; // ganti dengan username database Anda
$password = ''; // ganti dengan password database Anda

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produk_id = $_POST['produk_id'];
    $jumlah = $_POST['jumlah'];
    $nama_pembeli = 'Pembeli'; // Anda dapat menambahkan form untuk mendapatkan nama dan email
    $email_pembeli = 'email@domain.com';
    $alamat = 'Alamat Pembeli';

    // Insert ke tabel pesanan
    $stmt = $pdo->prepare('INSERT INTO pesanan (nama_pembeli, email_pembeli, alamat, produk_id, jumlah) VALUES (:nama_pembeli, :email_pembeli, :alamat, :produk_id, :jumlah)');
    $stmt->execute([
        'nama_pembeli' => $nama_pembeli,
        'email_pembeli' => $email_pembeli,
        'alamat' => $alamat,
        'produk_id' => $produk_id,
        'jumlah' => $jumlah
    ]);

    // Kirim email konfirmasi
    $to = $email_pembeli;
    $subject = "Konfirmasi Pesanan";
    $message = "Terima kasih telah memesan produk dari IKANku.\n\n";
    $message .= "Produk: " . htmlspecialchars($produk_id) . "\n";
    $message .= "Jumlah: " . htmlspecialchars($jumlah) . "\n";
    $message .= "Alamat: " . htmlspecialchars($alamat) . "\n";
    $headers = "From: no-reply@ikan-ku.com\r\n";
    
    mail($to, $subject, $message, $headers);

    echo '<h2>Pesanan Anda Telah Diterima</h2>';
    echo '<p>Terima kasih telah memesan produk kami. Kami akan segera memproses pesanan Anda.</p>';
} else {
    echo '<h2>Terjadi Kesalahan</h2>';
    echo '<p>Silakan coba lagi.</p>';
}
?>
