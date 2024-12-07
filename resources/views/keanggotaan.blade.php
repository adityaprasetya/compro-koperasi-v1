<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<style>
    /* Menambahkan style untuk mengatur posisi card di tengah */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .card {
      width: 300px; /* Atur ukuran kartu sesuai keinginan */
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .image img {
      width: 100%;
      height: auto;
      border-bottom: 1px solid #ddd;
    }

    .content {
      padding: 15px;
      text-align: center;
    }

    .content h3 {
      margin-bottom: 10px;
    }

    .content a {
      color: #007bff;
      text-decoration: none;
    }

    .content a:hover {
      text-decoration: underline;
    }
  </style>

<section id="main-container" class="main-container">
    <div class="center">
        <h3 class="column-title">Keanggotaan KSPPS TMI</h3>
    </div>
         
  <div class="container">
    <!-- Card dengan variabel khusus -->
    <div class="card" id="specialCard">
      <div class="image">
        <img src="assets/images-form.png" class="img-fluid" alt="Image">
      </div>
      <div class="content">
        <h3>Form</h3>
        <a href="https://forms.gle/pxL92SeQEhiVwbMr8" target="_blank">Klik link untuk isi Form</a>
      </div>
    </div>
  </div><!-- Container end -->
   
</section><!-- Main container end -->

<!-- Footer -->
@include('layouts.footer')