<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<div class="container">
        <div class="row">

            <!-- Kolom Konten Artikel -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="post-content post-single">
                        <!-- Menampilkan gambar artikel -->
                        <div class="post-media post-image">
                        <img loading="lazy" 
                        src="{{ $blog->image ? url('storage/images/' . $blog->image) : 'https://via.placeholder.com/800x400?text=No+Image' }}" 
                        class="img-fluid mt-3" alt="post-image">
                    </div>

                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <!-- Menampilkan penulis artikel -->
                                <span class="post-author">
                                    <i class="fas fa-user"></i>{{ $blog->author->name }}
                                </span>
                                <!-- Menampilkan tanggal artikel -->
                                <span class="post-meta-date"><i class="far fa-calendar"></i>{{ $blog->created_at->format('l, d F Y') }}</span>
                            </div>
                            <!-- Menampilkan judul artikel -->
                            <h2 class="entry-title">{{ $blog->title }}</h2>
                        </div>

                        <div class="entry-content">
                            <!-- Menampilkan konten artikel -->
                            <div>{!! nl2br(e($blog->content)) !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Col end -->

            <!-- Kolom Sidebar -->
            <div class="col-lg-4 mt-3">
                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="list-unstyled">
                            @foreach($blogs as $blog)
                                <li class="d-flex align-items-center">
                                    <div class="posts-thumb">
                                        <!-- Thumbnail artikel -->
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                        <img loading="lazy" alt="img" 
                                        src="{{ $blog->image ? url('storage/images/' . $blog->image) : 'https://via.placeholder.com/80x50?text=No+Image' }}" 
                                        style="height: 50px; width: 80px;">
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
                    </div><!-- Recent Posts Widget -->
                </div><!-- Sidebar end -->
            </div>
            <!-- Sidebar Col end -->

        </div><!-- Main row end -->
</div><!-- Container end -->

<!-- Footer -->
@include('layouts.footer')