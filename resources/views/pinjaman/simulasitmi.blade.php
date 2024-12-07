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
            <h3 class="column-title text-center mb-4">Simulasi TMI</h3>
        </div>
        
        <div class="row justify-content-center">
            <!-- Menampilkan gambar yang besar dan responsif -->
            @foreach ($simulasis as $simulasi)
                <div class="col-12 col-md-10">
                    <img src="{{ url('storage/simulasi/' . $simulasi->image) }}" class="img-fluid" alt="Simulasi TMI Image">
                </div>
            @endforeach
        </div>
    </div><!-- Container end -->
</section><!-- Main container end -->

<!-- Header -->
@include('layouts.footer')