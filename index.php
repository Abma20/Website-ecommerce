<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Danis Parfume</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* TEMA MERAH & HITAM UNTUK BERANDA */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #f0f0f0;
        }

        /* Navbar */
        .navbar {
            background-color: #dc3545;
            transition: background-color 0.3s ease;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;
        }
        
        /* CSS BARU UNTUK LOGO */
        .navbar-brand img {
            height: 35px; /* Mengatur tinggi logo */
            margin-right: 10px; /* Memberi jarak antara logo dan teks */
            border-radius: 50%; /* Membuat logo menjadi bulat */
            border: 2px solid white; /* Memberi bingkai putih tipis pada logo */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255,255,255,.8);
        }

        .navbar-dark .navbar-nav .nav-link.active,
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #fff;
        }

        /* Hero Section */
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/3.jpg');
            height: 90vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }
        .hero-section p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 1rem auto;
        }
        .btn-hero {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
            padding: 12px 30px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-hero:hover {
            background-color: #c82333;
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
        }
        
        /* Sections */
        .section {
            padding: 80px 0;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-weight: 700;
        }
        .section-title span {
            color: #dc3545;
        }

        /* Kategori Card */
        .category-card {
            background-color: #2b2b2b;
            border: 1px solid #444;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            transition: all 0.3s ease;
        }
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .category-card img {
            height: 200px;
            object-fit: cover;
        }
        .category-card .card-body {
            padding: 20px;
        }
        .category-card .btn-category {
            background-color: transparent;
            border: 2px solid #dc3545;
            color: #dc3545;
            font-weight: bold;
            border-radius: 50px;
        }
        .category-card .btn-category:hover {
            background-color: #dc3545;
            color: white;
        }

        /* Keunggulan Section */
        .feature-box {
            text-align: center;
        }
        .feature-box .icon {
            font-size: 3rem;
            color: #dc3545;
            margin-bottom: 15px;
        }

        /* Testimoni Section */
        .testimonial-card {
            background-color: #2b2b2b;
            padding: 30px;
            border-radius: 10px;
            border-left: 5px solid #dc3545;
        }
        .testimonial-card p {
            font-style: italic;
        }
        .testimonial-card .author {
            font-weight: bold;
            color: white;
        }

        /* Footer */
        .footer {
            background-color: #dc3545;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/Logo1.jpg" alt="Logo Danis Parfume">
            Danis Parfume
        </a>
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
                 <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="container">
        <h1>Temukan Aroma Kemewahan Anda</h1>
        <p>Jelajahi koleksi parfum original terbaik yang dirancang untuk menonjolkan karakter unik Anda setiap hari.</p>
        <a href="toko.php" class="btn btn-hero">Lihat Semua Koleksi</a>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Jelajahi <span>Kategori</span></h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="category-card">
                    <img src="img/pria.png" class="img-fluid" alt="Parfum Pria">
                    <div class="card-body">
                        <h5 class="card-title">Parfum Pria</h5>
                        <p class="card-text text-white-50">Aroma maskulin yang kuat dan menyegarkan.</p>
                        <a href="toko.php" class="btn btn-category">Lihat Pilihan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="category-card">
                    <img src="img/wanita.png"" class="img-fluid" alt="Parfum Wanita">
                    <div class="card-body">
                        <h5 class="card-title">Parfum Wanita</h5>
                        <p class="card-text text-white-50">Wewangian lembut, elegan, dan menggoda.</p>
                        <a href="toko.php" class="btn btn-category">Lihat Pilihan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="category-card">
                    <img src="img/sex.png"class="img-fluid" alt="Parfum Unisex">
                    <div class="card-body">
                        <h5 class="card-title">Parfum Unisex</h5>
                        <p class="card-text text-white-50">Aroma universal yang cocok untuk semua.</p>
                        <a href="toko.php" class="btn btn-category">Lihat Pilihan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark">
    <div class="container">
        <h2 class="section-title">Kenapa Memilih <span>Danis Parfume?</span></h2>
        <div class="row">
            <div class="col-md-4 feature-box mb-4">
                <div class="icon"><i class="bi bi-patch-check-fill"></i></div>
                <h5>100% Original</h5>
                <p class="text-white-50">Kami menjamin semua produk yang kami jual adalah asli dan berkualitas tinggi.</p>
            </div>
            <div class="col-md-4 feature-box mb-4">
                <div class="icon"><i class="bi bi-truck"></i></div>
                <h5>Pengiriman Cepat</h5>
                <p class="text-white-50">Pesanan Anda akan kami proses dan kirimkan secepat mungkin ke seluruh Indonesia.</p>
            </div>
            <div class="col-md-4 feature-box mb-4">
                <div class="icon"><i class="bi bi-wallet-fill"></i></div>
                <h5>Harga Terbaik</h5>
                <p class="text-white-50">Dapatkan parfum favorit Anda dengan penawaran dan harga paling kompetitif.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Apa Kata <span>Pelanggan Kami</span></h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="testimonial-card">
                    <p>"Pelayanannya ramah banget, parfumnya juga original dan tahan lama. Pasti akan beli lagi di sini!"</p>
                    <div class="author">- Rina, Jakarta</div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="testimonial-card">
                    <p>"Pengirimannya super cepat, packingnya juga aman banget. Wangi parfumnya persis seperti yang biasa saya beli di counter. Recommended!"</p>
                    <div class="author">- Budi, Surabaya</div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <span>&copy;2025 DanisParfum website by majid</span>
    </div>
</footer>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/685accbf08902e190c938638/1iuhavjrl';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>