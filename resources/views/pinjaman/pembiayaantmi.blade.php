<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Header -->
@include('layouts.navbar')

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Judul di atas gambar -->
            <h3 class="column-title text-center mb-4">Pembiayaan TMI</h3>
        </div>
        
        <div class="row justify-content-center">
            <!-- Menampilkan gambar yang besar dan responsif -->
            @foreach ($pembiayaans as $pembiayaan)
                <div class="col-12 col-md-10">
                    <img src="{{ url('storage/pembiayaan/' . $pembiayaan->image) }}" class="img-fluid" alt="Pembiayaan TMI Image">
                </div>
            @endforeach
        </div>
    </div><!-- Container end -->
</section><!-- Main container end -->

<!-- Header -->
@include('layouts.footer')