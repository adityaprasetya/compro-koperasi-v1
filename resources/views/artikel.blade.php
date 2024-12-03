<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<section id="main-container" class="main-container">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="widget-title">Temukan Artikel</h3>
                <form action="/artikel">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" autofocus="">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-8 mb-5 mb-lg-0">
                                                <div class="post">
                    <div class="post-media post-image">
                        <img loading="lazy" src="assets/1725275239.jpg" class="img-fluid" alt="post-image">
                    </div>


                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <span class="post-author"><i class="far fa-user"></i>Dewiku</span>
                                <span class="post-meta-date"><i class="far fa-calendar"></i>Kamis, 29 Agustus 2024</span>
                                <!-- <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#" class="comments-link">Comments</a></span> -->
                            </div>
                            <h2 class="entry-title">
                                <a href="/artikel-single">Sejarah Koperasi</a>
                            </h2>
                        </div>

                        <div class="entry-content">
                            <p>Sejarah pertumbuhan koperasi di seluruh 
dunia disebabkan oleh tidak dapat dipecahkannya masalah kemiskinan atas 
dasar semangat individualisme. Koperasi lahir sebagai alat untuk 
memperbaiki kepincangan...</p>
                        </div>

                        <div class="post-footer">
                            <a href="/artikel-single" class="btn btn-primary">Selengkapnya</a>
                        </div>

                    </div>
                </div>
                                <div class="post">
                    <div class="post-media post-image">
                        <img loading="lazy" src="assets/1724903464.png" class="img-fluid" alt="post-image">
                    </div>


                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <span class="post-author"><i class="far fa-user"></i>Dewiku</span>
                                <span class="post-meta-date"><i class="far fa-calendar"></i>Kamis, 29 Agustus 2024</span>
                                <!-- <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#" class="comments-link">Comments</a></span> -->
                            </div>
                            <h2 class="entry-title">
                                <a href="/artikel-single">Koperasi Jantungnya Roda Perekonomian Bangsa</a>
                            </h2>
                        </div>

                        <div class="entry-content">
                            <p> Tanggal 12 Juli menjadi momentum Bangsa 
Indonesia dalam memperingati hari lahirnya Koperasi. Koperasi bagaikan 
jantungnya ekonomi bangsa Indonesia. Setiap pergerakan turun naiknya 
perekonomian seakan...</p>
                        </div>

                        <div class="post-footer">
                            <a href="/artikel-single" class="btn btn-primary">Selengkapnya</a>
                        </div>

                    </div>
                </div>
                                

                <div class="d-flex justify-content-start">
                    
                </div>


            </div><!-- Content Col end -->

            <div class="col-lg-4">

                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="list-unstyled">
                                                        <li class="d-flex align-items-center">
                                <div class="posts-thumb">
                                    <a href="/artikel-single"><img loading="lazy" alt="img" style="height: 50px; Width: 80px;" src="assets/1725275239.jpg"></a>
                                </div>
                                <div class="post-info">
                                    <h4 class="entry-title">
                                        <a href="/artikel-single">Sejarah Koperasi</a>
                                    </h4>
                                </div>
                            </li>
                                                        <li class="d-flex align-items-center">
                                <div class="posts-thumb">
                                    <a href="/artikel-single"><img loading="lazy" alt="img" style="height: 50px; Width: 80px;" src="assets/1724903464.png"></a>
                                </div>
                                <div class="post-info">
                                    <h4 class="entry-title">
                                        <a href="/artikel-single">Koperasi Jantungnya Roda Perekonomian Bangsa</a>
                                    </h4>
                                </div>
                            </li>
                            
                        </ul>

                    </div>

                    <!-- <div class="widget">
                        <h3 class="widget-title">Categories</h3>
                                                <ul class="arrow nav nav-tabs">
                            <li><a href="/blogGuest?category=info-tentang-koperasian">Tentang koperasi</a></li>
                        </ul>
                                                <ul class="arrow nav nav-tabs">
                            <li><a href="/blogGuest?category=pinjaman">Pinjaman</a></li>
                        </ul>
                                                <ul class="arrow nav nav-tabs">
                            <li><a href="/blogGuest?category=hot-news">Hot News</a></li>
                        </ul>
                                            </div> -->


                </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->

<!-- Footer -->
@include('layouts.footer')