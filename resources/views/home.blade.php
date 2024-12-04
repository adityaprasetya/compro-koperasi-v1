<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<div class="banner-carousel banner-carousel-2 slick-initialized slick-slider">
    <button type="button" class="carousel-control left slick-arrow" aria-label="carousel-control">
        <i class="fas fa-chevron-left"></i>
    </button>
    <div class="slick-list draggable">
        <div class="slick-track" style="opacity: 1; width: 2732px;">
            @foreach ($sliders as $slider)
            <div class="banner-carousel-item slick-slide" style="background-image: url('storage/sliders/' . $sliders->image); width: 1366px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" data-slick-index="{{ $loop->index }}" aria-hidden="false" tabindex="0">
                <div class="container">
                    <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h3 class="box-slide-sub-title">Selamat Datang</h3>
                            <p class="box-slide-description text-dark">
                                Simpanan untuk perorangan dengan persyaratan mudah dan ringan <br>
                                <strong>Hanya di Koperasi Telaga Mandiri Indonesia</strong>
                            </p>
                            <p>
                                <a href="https://api.whatsapp.com/send?phone=628152121582" class="slider btn btn-primary" tabindex="0">Klik untuk informasi lebih lanjut</a>
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