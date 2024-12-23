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
    <!-- Kolom Konten -->
    <div class="col-lg-8 mb-5 mb-lg-0">
        @foreach($blogs as $blog)
            <div class="post">
                <div class="post-media post-image">
                    <!-- Menampilkan gambar artikel -->
                    <img loading="lazy" 
                     src="{{ $blog->image ? url('storage/images/' . $blog->image) : 'https://via.placeholder.com/800x400?text=No+Image' }}" 
                     class="img-fluid" alt="post-image">
                </div>

                <div class="post-body">
                    <div class="entry-header">
                        <div class="post-meta">
                            <!-- Menampilkan penulis artikel -->
                            <span class="post-author"><i class="far fa-user"></i>{{ $blog->author->name }}</span>
                            <!-- Menampilkan tanggal artikel -->
                            <span class="post-meta-date"><i class="far fa-calendar"></i>{{ $blog->created_at->format('l, d F Y') }}</span>
                        </div>
                        <!-- Judul Artikel -->
                        <h2 class="entry-title">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h2>
                    </div>

                    <div class="entry-content">
                        <!-- Potongan konten artikel -->
                        <p>{{ substr($blog->content, 0, 100) }}...</p>
                    </div>

                    <div class="post-footer">
                        <!-- Tautan untuk melihat artikel selengkapnya -->
                        <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Content Col end -->

    <!-- Kolom Sidebar -->
    <div class="col-lg-4">
        <div class="sidebar sidebar-right">
        <div class="widget recent-posts">
            <h3 class="widget-title">Recent Posts</h3>
            <ul class="list-unstyled">
                @foreach($blogs as $blog)
                    <li class="d-flex align-items-center">
                        <div class="posts-thumb">
                            <!-- Thumbnail artikel -->
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                <img loading="lazy" alt="img" style="height: 50px; width: 80px;" 
                                    src="{{ $blog->image ? url('storage/images/' . $blog->image) : 'https://via.placeholder.com/80x50?text=No+Image' }}">
                            </a>
                        </div>
                        <div class="post-info">
                            <h4 class="entry-title">
                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                            </h4>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

            <!-- <div class="widget">
                <h3 class="widget-title">Categories</h3>
                <ul class="arrow nav nav-tabs">
                    <li><a href="/blogGuest?category=info-tentang-koperasian">Tentang koperasi</a></li>
                    <li><a href="/blogGuest?category=pinjaman">Pinjaman</a></li>
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