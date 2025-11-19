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

// Mengambil ID produk dari parameter URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Mengambil data produk berdasarkan ID
$sql = "SELECT * FROM produk WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Produk tidak ditemukan.");
}

$produk = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="icon" href="img/ikanku.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Edit Produk</h1>
    
    <!-- Form Edit Produk -->
    <form method="POST" action="proses_produk.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($produk['id']); ?>">
        
        <div class="form-group">
            <label for="nama">Nama Produk:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($produk['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($produk['deskripsi']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($produk['harga']); ?>" required>
        </div>
        <div class="form-group">
            <label for="gambar">Unggah Gambar Baru (opsional):</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            <img src="uploads/<?php echo htmlspecialchars($produk['gambar']); ?>" alt="<?php echo htmlspecialchars($produk['nama']); ?>" style="width:150px;height:auto;display:block;margin-top:10px;">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
        <a href="admin_produk.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
