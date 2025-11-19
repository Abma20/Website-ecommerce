<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kontak - Danis Parfume</title>
  <link rel="icon" href="img/logo.png" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    /* TEMA MERAH & HITAM */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #1a1a1a;
      color: #f0f0f0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .navbar, .footer {
      background-color: #dc3545;
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

    .contact-section {
      padding: 60px 15px;
    }

    .contact-section h2 {
      margin-bottom: 20px;
      font-weight: 700;
      color: white;
    }

    .contact-section p, .contact-section ul {
        color: #ccc;
    }
    
    .contact-section ul strong {
        color: white;
    }

    .contact-section a {
        color: #dc3545;
        font-weight: 500;
    }
    .contact-section a:hover {
        color: #c82333;
        text-decoration: none;
    }

    .map iframe {
      width: 100%;
      height: 350px;
      border: 1px solid #dc3545; /* Border merah agar lebih menyatu */
      border-radius: 8px;
      /* CSS filter DIHAPUS agar peta kembali ke mode terang seperti gambar */
    }
    
    .content-wrap {
        flex: 1;
    }

    .footer {
        color: white;
        padding: 15px 0;
        text-align: center;
    }

    @media (max-width: 768px) {
      .contact-section h2 {
        text-align: center;
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

    <div class="container contact-section">
      <div class="row align-items-center">
        <div class="col-md-6 order-2 order-md-1 mb-4 mb-md-0">
          <h2>Hubungi Kami</h2>
          <p>Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut mengenai produk kami, jangan ragu untuk menghubungi kami melalui informasi kontak yang tersedia.</p>
          <ul class="list-unstyled">
            <li class="mb-2"><strong>Alamat:</strong> Stadion Desa Kepel, RT.6/RW.3, Dusun Mekarmulya, Kec. Cisaga, Kab. Ciamis, Jawa Barat.</li>
            <li class="mb-2"><strong>Telepon:</strong> 085283254126</li>
            <li><strong>Email:</strong> <a href="mailto:info@danisparfum.my.id">info@danisparfum.my.id</a></li>
          </ul>
        </div>

        <div class="col-md-6 order-1 order-md-2 text-center">
          <h2 class="mb-4">Peta Lokasi</h2>
          <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.561439263486!2d108.48937907409217!3d-7.289768671670014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f43171dc0156d%3A0x6336332d72124a9e!2sDanis%20Parfum!5e0!3m2!1sen!2sid!4v1719230007887!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
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

</body>
</html>