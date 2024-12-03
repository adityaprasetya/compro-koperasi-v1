<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<div class="container">
    <div class="row">

        <div class="col-lg-8 mb-5 mb-lg-0">

            <div class="post-content post-single">
                <div class="post-media post-image">
                    <img loading="lazy" src="assets/1724903464.png" class="img-fluid mt-3" alt="post-image">
                </div>

                <div class="post-body">
                    <div class="entry-header">
                        <div class="post-meta">
                            <span class="post-author">
                                <i class="fas fa-user"></i>Dewiku
                            </span>
                            <span class="post-meta-date"><i class="far fa-calendar"></i>Kamis, 29 Agustus 2024</span>
                        </div>
                        <h2 class="entry-title">

                        </h2>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-4 mt-3">

            <div class="sidebar sidebar-right">
                <div class="widget recent-posts">
                    <h3 class="widget-title">Recent Posts</h3>
                    <ul class="list-unstyled">
                                                <li class="d-flex align-items-center">
                            <div class="posts-thumb">
                                <a href="#"><img loading="lazy" alt="img" src="assets/1725275239.jpg" style="height: 50px; Width: 80px;"></a>
                            </div>
                            <div class="post-info">
                                <h4 class="entry-title">
                                    <a href="#">Sejarah Koperasi</a>
                                </h4>
                            </div>
                        </li>
                                                <li class="d-flex align-items-center">
                            <div class="posts-thumb">
                                <a href="#"><img loading="lazy" alt="img" src="assets/1724903464.png" style="height: 50px; Width: 80px;"></a>
                            </div>
                            <div class="post-info">
                                <h4 class="entry-title">
                                    <a href="#">Koperasi Jantungnya Roda Perekonomian Bangsa</a>
                                </h4>
                            </div>
                        </li>
                        
                    </ul>

                </div>
            </div><!-- Main row end -->
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')