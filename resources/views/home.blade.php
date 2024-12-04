<!-- Header -->
@include('layouts.header')

<style>

.carousel-item {
    height: 500px; /* Sesuaikan tinggi carousel sesuai kebutuhan */
}

.carousel-item .carousel-caption {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: white;
}

.box-slide-sub-title {
    font-size: 2rem;
    font-weight: bold;
}

.box-slide-description {
    font-size: 1.2rem;
}

.slider {
    font-size: 1rem;
    padding: 10px 20px;
}

/* Styling untuk tombol kontrol sebelumnya dan berikutnya */
.carousel-control-prev,
.carousel-control-next {
    width: 40px; /* Ukuran tombol */
    height: 40px; /* Ukuran tombol */
    border-radius: 50%; /* Membuat tombol menjadi bulat */
    background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
    border: none; /* Menghapus border default */
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1; /* Memastikan tombol tidak transparan */
    position: absolute; /* Posisi absolute */
    top: 50%; /* Menempatkan tombol di tengah vertikal */
    transform: translateY(-50%); /* Mengoreksi posisi agar benar-benar di tengah */
}

/* Ukuran dan penataan ikon */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: white; /* Warna ikon tombol */
    width: 20px; /* Ukuran ikon */
    height: 20px; /* Ukuran ikon */
    border-radius: 50%; /* Membuat ikon menjadi bulat */
}

/* Menambahkan efek hover untuk kontrol */
.carousel-control-prev:hover,
.carousel-control-next:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Menggelapkan latar belakang saat hover */
}

/* Membuat tombol kontrol lebih kecil pada layar mobile */
@media (max-width: 576px) {
    .carousel-control-prev,
    .carousel-control-next {
        width: 35px; /* Lebih kecil pada layar mobile */
        height: 35px; /* Lebih kecil pada layar mobile */
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 15px; /* Ukuran ikon lebih kecil di layar mobile */
        height: 15px; /* Ukuran ikon lebih kecil di layar mobile */
    }
}

</style>

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 2 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/sliders/' . $slider->image) }}'); background-size: cover; background-position: center;">
                <div class="carousel-caption d-flex justify-content-center align-items-center w-100 h-100">
                    <div>
                        <h3 class="box-slide-sub-title">Selamat Datang</h3>
                        <p class="box-slide-description text-dark">Simpanan untuk perorangan dengan persyaratan mudah dan ringan <br> <strong>Hanya di Koperasi Telaga Mandiri Indonesia</strong></p>
                        <p>
                            <a href="https://api.whatsapp.com/send?phone=628152121582" class="slider btn btn-primary">Klik untuk informasi lebih lanjut</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
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

<!-- Bootstrap JS (untuk Carousel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
    // Menunggu sampai halaman sepenuhnya dimuat
    document.addEventListener('DOMContentLoaded', function () {
        // Mendapatkan referensi ke element carousel
        var myCarousel = document.querySelector('#carouselExample');
        
        // Membuat instance carousel menggunakan Bootstrap API
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 1000, // Interval diatur setiap 1 detik (1000ms)
            ride: 'carousel', // Untuk autoplay
            pause: 'hover'    // Hentikan autoplay jika cursor hover di atas carousel
        });

        // Event listener untuk ketika carousel berpindah slide
        myCarousel.addEventListener('slid.bs.carousel', function (event) {
            console.log('Slide berpindah! Indeks slide sekarang: ' + event.to);
        });

        // Contoh menambahkan kontrol tombol secara manual menggunakan JavaScript
        // Mengatur untuk melompat ke slide tertentu (indeks 2 berarti slide ke-3)
        document.getElementById('goToSlide3').addEventListener('click', function () {
            carousel.to(2); // Berpindah ke slide ke-3
        });

        // Menghentikan autoplay dengan tombol
        document.getElementById('pauseCarousel').addEventListener('click', function () {
            carousel.pause(); // Hentikan autoplay
        });

        // Menjalankan kembali autoplay dengan tombol
        document.getElementById('resumeCarousel').addEventListener('click', function () {
            carousel.cycle(); // Mulai kembali autoplay
        });
    });
</script>