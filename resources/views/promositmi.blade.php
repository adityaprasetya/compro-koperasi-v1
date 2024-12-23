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
            <h3 class="column-title text-center mb-4">Promosi TMI</h3>
        </div>
        
        <div class="row justify-content-center">
            <!-- Menampilkan gambar yang besar dan responsif dengan 5 gambar per baris -->
            @foreach ($promosis as $promosi)
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 text-center">
                    <img src="{{ url('storage/promosi/' . $promosi->image) }}" class="img-fluid" alt="Promosi TMI Image">
                </div>
            @endforeach
        </div>
        
    </div><!-- Container end -->
</section><!-- Main container end -->


<!-- Header -->
@include('layouts.footer')