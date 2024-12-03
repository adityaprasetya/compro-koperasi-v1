<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Hijau</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna hijau sebagai tema utama */
        .bg-hijau {
            background-color: #28a745;
        }

        .text-hijau {
            color: #28a745;
        }

        .btn-hijau {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-hijau:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .hero-section {
            background: #28a745;
            color: white;
            padding: 80px 0;
        }

        .footer {
            background-color: #2f2f2f;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand text-hijau" href="#">KSSPS TMI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Home Link -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>

                    <!-- Profil Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfil">
                            <li><a class="dropdown-item" href="#">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#">Legalitas</a></li>
                            <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                        </ul>
                    </li>

                    <!-- Lini Bisnis Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLiniBisnis" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownLiniBisnis">
                            <li><a class="dropdown-item" href="#">Pembiayaan Pensiunan PNS</a></li>
                            <li><a class="dropdown-item" href="#">Pembiayaan Pensiunan TNI/Polri</a></li>
                            <li><a class="dropdown-item" href="#">Target Pembiayaan</a></li>
                        </ul>
                    </li>

                    <!-- Jaringan Kantor Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownJaringanKantor" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Panduan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownJaringanKantor">
                            <li><a class="dropdown-item" href="#">Tangerang</a></li>
                            <li><a class="dropdown-item" href="#">Rangkasbitung</a></li>
                            <li><a class="dropdown-item" href="#">Depok</a></li>
                            <li><a class="dropdown-item" href="#">Sukabumi</a></li>
                            <li><a class="dropdown-item" href="#">Bekasi</a></li>
                        </ul>
                    </li>

                    <!-- Kerjasama Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kerjasama</a>
                    </li>

                    <!-- Hubungi Kami Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hubungi Kami</a>
                    </li>

                    <!-- FAQ Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Website Kami</h1>
            <p class="lead">Solusi terbaik untuk kebutuhan Anda dengan layanan yang cepat dan terpercaya.</p>
            <a href="#" class="btn btn-hijau btn-lg">Mulai Sekarang</a>
        </div>
    </header>

<!-- Profil Section -->
<section id="profil" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">Profil Kami</h2>
            <div class="row">
                <div class="col-md-4">
                    <h4>Sejarah</h4>
                    <p>Kami adalah perusahaan yang berdiri sejak tahun 2010, berfokus pada pengembangan teknologi dan inovasi. Kami telah membantu ribuan pelanggan dengan solusi yang tepat dan efektif.</p>
                </div>
                <div class="col-md-4">
                    <h4>Visi</h4>
                    <p>Menjadi perusahaan terdepan dalam penyediaan solusi digital yang inovatif dan dapat diandalkan, memberikan nilai lebih bagi pelanggan dan mitra.</p>
                </div>
                <div class="col-md-4">
                    <h4>Misi</h4>
                    <ul>
                        <li>Memberikan layanan terbaik untuk setiap pelanggan.</li>
                        <li>Mengembangkan produk dan layanan yang inovatif.</li>
                        <li>Menjadi pemimpin dalam industri teknologi digital.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="bg-light py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">Layanan Kami</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Layanan 1</h5>
                            <p class="card-text">Layanan pertama yang kami tawarkan untuk memenuhi kebutuhan digital Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Layanan 2</h5>
                            <p class="card-text">Layanan kedua yang menawarkan solusi bisnis terbaik dengan teknologi terbaru.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Layanan 3</h5>
                            <p class="card-text">Layanan ketiga kami adalah untuk membantu perusahaan Anda berkembang lebih pesat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">Kontak Kami</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Hubungi Kami</h4>
                    <p>Email: <a href="mailto:info@domain.com">info@domain.com</a></p>
                    <p>Nomor Telepon: +62 123 456 7890</p>
                </div>
                <div class="col-md-6">
                    <h4>Formulir Kontak</h4>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-hijau">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2024 Semua Hak Dilindungi. Dibuat dengan ❤️</p>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
