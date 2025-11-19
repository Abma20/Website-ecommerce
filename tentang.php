<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - Danis Parfume</title>
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
            color: white !important;
        }

        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .about-section {
            padding: 60px 15px;
        }

        .about-section h2 {
            margin-bottom: 30px;
            font-weight: 700;
            color: white; /* Judul utama menjadi putih */
        }

        .about-section p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #ccc; /* Teks paragraf dibuat sedikit lebih redup */
        }

        .about-section img {
            max-width: 100%;
            border-radius: 8px;
            /* Memberi efek bayangan yang lebih cocok untuk tema gelap */
            box-shadow: 0 8px 25px rgba(0,0,0,0.3); 
        }

        .content-wrap {
            flex: 1;
        }

        .footer {
            background-color: #dc3545;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .about-section h2 {
                text-align: center;
            }
            .about-section p {
                text-align: justify;
            }
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
            </ul>
        </div>
    </div>
</nav>

    <div class="container about-section">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1 mb-4 mb-md-0">
                <h2>Tentang Danis Parfume</h2>
                <p>Danis Parfum adalah toko parfum terpercaya yang menghadirkan berbagai pilihan wewangian berkualitas tinggi untuk pria dan wanita. Kami percaya bahwa parfum bukan sekadar aroma, melainkan cerminan kepribadian, suasana hati, dan gaya hidup.</p>
                <p>Sejak didirikan, Danis Parfum berkomitmen untuk menyediakan produk parfum original, tahan lama, dan dengan harga yang bersahabat. Kami menawarkan beragam jenis parfum, mulai dari aroma floral yang lembut, citrus yang menyegarkan, hingga gourmand yang manis dan menggoda — cocok untuk berbagai selera dan momen spesial Anda.</p>
            </div>
            <div class="col-md-6 order-1 order-md-2 text-center">
                <img src="img/Logo1.jpg" alt="Tentang Danis Parfume" class="img-fluid">
            </div>
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