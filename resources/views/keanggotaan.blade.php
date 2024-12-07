<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<section id="main-container" class="main-container">
  <div class="container d-flex justify-content-center">
    <h3 class="column-title">Keanggotaan KSPPS TMI</h3>
    <!-- Card dengan variabel khusus -->
    <div class="card" id="specialCard" style="width: 18rem;">
      <div class="image">
        <img src="assets/images-form.png" class="card-img-top" alt="Image">
      </div>
      <div class="card-body text-center">
        <h3 class="card-title">Form</h3>
        <a href="https://forms.gle/pxL92SeQEhiVwbMr8" class="btn btn-primary" target="_blank">Klik link untuk isi Form</a>
      </div>
    </div>
  </div><!-- Container end -->
   
</section><!-- Main container end -->

<!-- Footer -->
@include('layouts.footer')