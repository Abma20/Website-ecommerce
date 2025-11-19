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
    <title>Toko - Danis Parfume</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* TEMA MERAH & HITAM */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a; /* Latar belakang hitam/abu gelap */
            color: #f0f0f0; /* Warna teks putih pudar */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar, .footer {
            background-color: #dc3545; /* Aksen Merah Kuat */
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: white !important; /* Tambahkan !important untuk memastikan warna diterapkan */
        }

        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
        }
        
        /* Memberi warna pada toggler icon di mode mobile */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .product-card {
            margin: 15px 0;
            background-color: #2b2b2b; /* Kartu produk abu-abu gelap */
            border: 1px solid #444; /* Border subtil */
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            border-color: #dc3545; /* Border merah saat disentuh */
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 1.25rem;
        }
        
        .card-title {
            color: white; /* Judul kartu putih agar jelas */
            font-weight: bold;
        }
        
        .card-text {
            color: #ccc; /* Deskripsi abu-abu terang */
        }

        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
            font-weight: bold;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
            transform: scale(1.05);
        }

        .content-wrap {
            flex: 1;
        }

        .footer {
            color: white;
            padding: 15px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="content-wrap">
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Danis Parfume</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="toko.php">Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tentang.php">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontak.php">Kontak</a>
                </li>
        </div>
    </div>
</nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4 font-weight-bold">Koleksi Parfum Kami</h1>
        <div class="row">
            <?php
            // Menampilkan data produk
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Menambahkan kelas h-100, d-flex, flex-column, dan mt-auto untuk merapikan kartu
                    echo "<div class='col-lg-4 col-md-6 col-sm-12 mb-4'>
                            <div class='card product-card h-100'>
                                <img src='uploads/" . htmlspecialchars($row['gambar']) . "' class='card-img-top' alt='" . htmlspecialchars($row['nama']) . "'>
                                <div class='card-body d-flex flex-column'>
                                    <h5 class='card-title'>" . htmlspecialchars($row['nama']) . "</h5>
                                    <p class='card-text'>" . htmlspecialchars($row['deskripsi']) . "</p>
                                    <a href='beli.php?product=" . urlencode($row['nama']) . "' class='btn btn-primary mt-auto'>Beli Sekarang</a>
                                </div>
                            </div>
                        </div>";
                }
            } else {
                echo "<div class='col-12'><p class='text-center'>Tidak ada produk tersedia.</p></div>";
            }
            ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <span>&copy;2025 DanisParfum website by majid</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>