<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Header -->
@include('layouts.navbar')

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <h3 class="column-title text-center">Pembiayaan TMI</h3>
            <div class="row justify-content-md-center">
                <!-- Menampilkan gambar yang besar dan responsif -->
                @foreach ($pembiayaans as $pembiayaan)
                <div class="col-12 col-md-8">
                    <img src="{{ url('storage/pembiayaan/' . $pembiayaan->image) }}" class="img-fluid" alt="Pembiayaan TMI Image">
                </div>
                @endforeach
            </div>
        </div>
    </div><!-- Container end -->
</section><!-- Main container end -->

<!-- Header -->
@include('layouts.footer')