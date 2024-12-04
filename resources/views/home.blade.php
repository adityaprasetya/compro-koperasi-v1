<!-- Header -->
@include('layouts.header')

<style>

/* 1. Styling untuk container utama slider */
.banner-carousel {
    width: 100%; /* Agar slider mengisi lebar penuh dari container induk */
    position: relative;
    overflow: hidden; /* Menyembunyikan elemen yang keluar dari area tampilan */
}

/* 2. Styling untuk setiap item slider */
.banner-carousel-item {
    background-size: cover; /* Agar gambar menutupi seluruh elemen tanpa distorsi */
    background-position: center; /* Menjaga gambar tetap terpusat */
    height: 400px; /* Sesuaikan tinggi slider sesuai kebutuhan */
    display: flex;
    align-items: center; /* Menyelaraskan konten di tengah secara vertikal */
    justify-content: center; /* Menyelaraskan konten di tengah secara horizontal */
}

/* 3. Styling untuk konten di dalam slider */
.box-slider-content {
    position: absolute;
    top: 50%; /* Posisi konten di tengah vertikal */
    left: 50%; /* Posisi konten di tengah horizontal */
    transform: translate(-50%, -50%); /* Untuk memastikan konten benar-benar berada di tengah */
    color: #fff; /* Warna teks agar lebih terlihat di atas gambar */
    text-align: center; /* Menyelaraskan teks ke tengah */
    padding: 20px;
}

/* 4. Styling untuk sub judul dan deskripsi */
.box-slide-sub-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.box-slide-description {
    font-size: 16px;
    margin-bottom: 20px;
}

.slider.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
}

/* 5. Styling untuk tombol navigasi (arrow) */
.slick-prev, .slick-next {
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border-radius: 50%;
    font-size: 18px;
    padding: 10px;
    z-index: 999;
}

.slick-prev {
    left: 10px;
}

.slick-next {
    right: 10px;
}

/* 6. Styling untuk titik navigasi (dots) */
.slick-dots {
    bottom: 20px;
    z-index: 999;
}

.slick-dots li button:before {
    font-size: 12px;
    color: #fff;
}

.slick-dots li.slick-active button:before {
    color: #007bff;
}

</style>

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<div class="banner-carousel">
    <button type="button" class="carousel-control left slick-arrow" aria-label="carousel-control">
        <i class="fas fa-chevron-left"></i>
    </button>
    <div class="slick-list draggable">
        <div class="slick-track">
            @foreach ($sliders as $slider)
            <div class="banner-carousel-item slick-slide" style="background-image: url('{{ asset('storage/sliders/' . $slider->image) }}');">
                <div class="container">
                    <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h3 class="box-slide-sub-title">Selamat Datang</h3>
                            <p class="box-slide-description text-dark">Simpanan untuk perorangan dengan persyaratan mudah dan ringan <br> <strong>Hanya di Koperasi Telaga Mandiri Indonesia</strong></p>
                            <p>
                                <a href="https://api.whatsapp.com/send?phone=628152121582" class="slider btn btn-primary">Klik untuk informasi lebih lanjut</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <button type="button" class="carousel-control right slick-arrow" aria-label="carousel-control">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>

<section class="call-to-action no-padding">
    <div class="container">
        <div class="action-style-box">
            <div class="row">
                <div class="col-md-8 text-center text-md-left">
                    <div class="call-to-action-text">
                        <h3 class="action-title">"Meningkatkan Perekonomian Indonesia dengan Prinsip Syariah"</h3>
                    </div>
                </div><!-- Col end -->
                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                    <div class="call-to-action-btn">
                        <a class="btn btn-primary" href="/visi-misi">Tentang Kami</a>
                    </div>
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- Action style box -->
    </div><!-- Container end -->
</section><!-- Action end -->



<section id="ts-service-area" class="ts-service-area pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">Koperasi Telaga Mandiri Indonesia</h2>
                <h3 class="section-sub-title">Kenapa Kami?</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-lg-4">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="assets/mobile-banking.png" width="80px" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Pembiayaan</a></h3>
                        <p>memiliki program pembiayaan syariah, seperti 
pembiayaan modal usaha untuk membantu pengusaha kecil yang akan 
mengembangkan usahanya atau membutuhkan tambahan modal.</p>
                    </div>
                </div><!-- Service 1 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="assets/care.png" width="80px" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Support</a></h3>
                        <p>Melayani Sepenuh Hati Dan Profesional.</p>
                    </div>
                </div><!-- Service 2 end -->

            </div><!-- Col end -->

            <div class="col-lg-4 text-center">
                <img loading="lazy" class="img-fluid" src="assets/service-center.jpg" alt="service-avater-image">
            </div><!-- Col end -->

            <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="assets/saving.png" width="80px" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Tabungan</a></h3>
                        <p>memiliki berbagai macam produk tabungan 
sesuai dengan tujuan Anda. Mulai dari tabungan sukarela, tabungan 
persiapan qurban, tabungan haji/umrah, dan tabungan berhadiah.</p>
                    </div>
                </div><!-- Service 4 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="assets/contribution.png" width="80px" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">kontribusi</a></h3>
                        <p>Memberi kontribusi sosial ekonomi kepada masyarakat di wilayah kantor pelayanan.</p>
                    </div>
                </div><!-- Service 5 end -->
            </div><!-- Col end -->
        </div><!-- Content row end -->

    </div>
    <!--/ Container end -->
</section><!-- Service end -->

<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Koperasi Telaga Mandiri Indonesia</h2>
                <h3 class="section-sub-title">Gallery</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <!-- galeri -->
        <div class="row">
            <div class="col-12">

                <!-- Galeri 3x3 Gambar -->
                <div class="row">
                    @foreach ($galeris as $galeri)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <img src="{{ url('storage/galeri/' . $galeri->image) }}" alt="Gallery Image {{ $loop->iteration }}" class="img-fluid">
                        </div>
                    @endforeach
                </div><!-- Row end -->

            </div>

            <div class="col-12">
                <div class="general-btn text-center">
                    <a class="btn btn-primary" href="/">Selengkapnya</a>
                </div>
            </div>

        </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Project area end -->

<section class="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Koperasi Telaga Mandiri Indonesia</h2>
                <h3 class="section-sub-title">Partnership kami</h3>
            </div>
        </div>
        <div class="row all-clients">
                    </div>

        <div class="col-12">
            <div class="general-btn text-center">
                <a class="btn btn-primary" href="#">Selengkapnya</a>
            </div>
        </div>
    </div>
    <!--/ Container end -->
</section><!-- Content end -->


<!--/ subscribe end -->

<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">Koperasi Telaga Mandiri Indonesia</h2>
                <h3 class="section-sub-title">Artikel Terbaru</h3>
            </div>
        </div>

        <div class="row">
    @foreach ($blogs as $blog)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                    <a href="{{ route('blog.show', $blog->slug) }}" class="latest-post-img">
                        <img loading="lazy" class="img-fluid" 
                             src="{{ $blog->image ? url('storage/images/' . $blog->image) : 'https://via.placeholder.com/80x80?text=No+Image' }}" 
                             width="80px" alt="img">
                    </a>
                </div>
                <div class="post-body">
                    <h4 class="post-title">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="d-inline-block">{{ $blog->title }}</a>
                    </h4>
                    <div class="latest-post-meta">
                        <span class="post-item-date">
                            <i class="fa fa-clock-o"></i> {{ $blog->created_at->format('l, d F Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

        <div class="general-btn text-center mt-4">
            <a class="btn btn-primary" href="/artikel">See All Posts</a>
        </div>
    </div>
</section>
<!--/ News end -->

<!-- Footer -->
@include('layouts.footer')

<!-- Pastikan Anda sudah menyertakan jQuery dan Slick Carousel -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        // Inisialisasi Slick Carousel
        $('.banner-carousel').slick({
            infinite: true,  // Mengaktifkan infinite scrolling
            slidesToShow: 1,  // Menampilkan 1 slide per waktu
            slidesToScroll: 1, // Mengscroll 1 slide pada setiap klik
            prevArrow: '.carousel-control.left',  // Tombol untuk navigasi kiri
            nextArrow: '.carousel-control.right',  // Tombol untuk navigasi kanan
            autoplay: true,  // Menjalankan autoplay
            autoplaySpeed: 5000,  // Kecepatan peralihan slide (5 detik)
            arrows: true,  // Menampilkan tombol navigasi (arrow)
            dots: true,  // Menampilkan titik navigasi
            adaptiveHeight: true,  // Menyesuaikan tinggi slider otomatis
            responsive: [
                {
                    breakpoint: 768, // Untuk perangkat dengan lebar layar 768px atau lebih kecil
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480, // Untuk perangkat dengan lebar layar 480px atau lebih kecil
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>