<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ikan_toko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // Hapus gambar produk dari direktori 'uploads'
    $sql = "SELECT gambar FROM produk WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($gambar);
    $stmt->fetch();
    $stmt->close();

    if ($gambar) {
        $file_path = 'uploads/' . $gambar;
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus file gambar
        }
    }

    // Hapus produk dari database
    $sql = "DELETE FROM produk WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Produk berhasil dihapus.";
        header("Location: admin_produk.php"); // Redirect kembali ke halaman kelola produk
        exit();
    } else {
        echo "Gagal menghapus produk: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
