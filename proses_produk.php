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

// Mendapatkan data dari form
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
$harga = isset($_POST['harga']) ? $_POST['harga'] : '';

// Handle gambar upload jika ada
$gambar_baru = '';
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $gambar_baru = basename($_FILES["gambar"]["name"]);
    } else {
        die("Gagal mengunggah gambar.");
    }
}

// Update data produk
if ($gambar_baru) {
    $sql = "UPDATE produk SET nama = ?, deskripsi = ?, harga = ?, gambar = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $nama, $deskripsi, $harga, $gambar_baru, $id);
} else {
    $sql = "UPDATE produk SET nama = ?, deskripsi = ?, harga = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $nama, $deskripsi, $harga, $id);
}

if ($stmt->execute()) {
    // Redirect ke halaman admin_produk.php setelah update berhasil
    header("Location: admin_produk.php");
    exit();
} else {
    echo "Gagal memperbarui produk: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
