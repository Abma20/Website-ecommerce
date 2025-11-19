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

// Proses tambah produk
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['gambar']['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Validasi jenis gambar
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadFile)) {
                $gambar = basename($_FILES['gambar']['name']);

                // Query untuk menambahkan data produk
                $sql = "INSERT INTO produk (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssis', $nama, $deskripsi, $harga, $gambar);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Produk berhasil ditambahkan!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal menambahkan produk: " . $stmt->error . "</div>";
                }
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Jenis file tidak diperbolehkan. Hanya jpg, jpeg, png, dan gif yang diizinkan.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Tidak ada gambar yang diunggah atau terjadi kesalahan.</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - IKANku</title>
    <link rel="icon" href="img/ikanku.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Tambah Produk</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama Produk:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="gambar">Unggah Gambar:</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" required>
        </div>
        <button type="submit" class="btn btn-success">Tambah Produk</button>
        <a href="admin_produk.php" class="btn btn-secondary">Kembali ke Admin</a>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
