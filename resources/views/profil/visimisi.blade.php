<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Header -->
@include('layouts.navbar')

<section id="main-container" class="main-container">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-6">
               <h3 class="column-title">Visi Misi</h3>
                <div class="row">
                    <div class="col">
                        <h5 class="">VISI</h5>
                        <p>Meningkatkan Perekonomian Indonesia dengan Prinsip Syariah Berlandaskan Azas Koperasi</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <h5 class="">MISI</h5>
                        <ul>
                            <li>Mensejahterakan Pensiunan Indonesia Dengan Prinsip Syariah</li>
                            <li>Memiliki Sumber Daya Manusia (SDM) yang berkualitas dan berdedikasi tinggi.</li>
                            <li>Memiliki Anggota yang Loyal.</li>
                            <li>Memberi solusi keuangan secara optimal bagi anggota, baik dalam Simpanan maupun Pembiayaan secara Syariah.</li>
                            
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Kolom untuk Menampilkan Video -->
            <div class="col-lg-6 mt-5 mt-lg-0">
                <!-- Embed YouTube video dengan ID video yang benar -->
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/YluJKooDw34" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
          
        </div><!-- Content row end -->
    </div><!-- Container end -->
</section><!-- Main container end -->

<!-- Header -->
@include('layouts.footer')