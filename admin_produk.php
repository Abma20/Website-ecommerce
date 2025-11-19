<?php
session_start(); // Memulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); // Redirect ke halaman login jika belum login
    exit;
}

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ikan_toko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data produk
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Produk</title>
    <link rel="icon" href="img/ikanku.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Kelola Produk</h1>

    <!-- Tombol Tambah Data -->
    <a href="tambah_produk.php" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="logout.php" class="btn btn-secondary mb-3">Logout</a>

    <!-- Tabel Produk -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $counter = 1; // Counter untuk ID produk
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $counter . "</td>"; // Menampilkan ID mulai dari 1
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                echo "<td><img src='uploads/" . htmlspecialchars($row['gambar']) . "' alt='" . htmlspecialchars($row['nama']) . "' style='width:100px;height:auto;'></td>";
                echo "<td>
                        <a href='edit_produk.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-primary'>Edit</a>
                        <form method='POST' action='hapus_produk.php' style='display:inline-block;'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                            <button type='submit' name='hapus' class='btn btn-danger'>Hapus</button>
                        </form>
                      </td>";
                echo "</tr>";
                $counter++; // Increment counter
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada produk</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
