<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Header -->
@include('layouts.navbar')

<section id="main-container" class="main-container">
<style>
 
.our-team {
  padding: 30px 0 40px;
  margin-bottom: 30px;
  background-color: #f7f5ec;
  text-align: center;
  overflow: hidden;
  position: relative;
}

.our-team .picture {
  display: inline-block;
  height: 130px;
  width: 130px;
  margin-bottom: 50px;
  z-index: 1;
  position: relative;
}

.our-team .picture::before {
  content: "";
  width: 100%;
  height: 0;
  border-radius: 50%;
  background-color: #0a6253;
  position: absolute;
  bottom: 135%;
  right: 0;
  left: 0;
  opacity: 0.9;
  transform: scale(3);
  transition: all 0.3s linear 0s;
}

.our-team:hover .picture::before {
  height: 100%;
}

.our-team .picture::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #0a6555;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}

.our-team .picture img {
  width: 100%;
  height: auto;
  border-radius: 50%;
  transform: scale(1);
  transition: all 0.9s ease 0s;
}

.our-team:hover .picture img {
  box-shadow: 0 0 0 14px #f7f5ec;
  transform: scale(0.7);
}

.our-team .title {
  display: block;
  font-size: 15px;
  color: #4e5052;
  text-transform: capitalize;
}

.our-team .social {
  width: 100%;
  padding: 0;
  margin: 0;
  background-color: #1369ce;
  position: absolute;
  bottom: -100px;
  left: 0;
  transition: all 0.5s ease 0s;
}

.our-team:hover .social {
  bottom: 0;
}

.our-team .social li {
  display: inline-block;
}

.our-team .social li a {
  display: block;
  padding: 10px;
  font-size: 17px;
  color: white;
  transition: all 0.3s ease 0s;
  text-decoration: none;
}

.our-team .social li a:hover {
  color: #0a6555;
  background-color: #0a6555;
}
.our-team .social {
  width: 100%;
  padding: 0;
  margin: 0;
  background-color: #0a6253;
  position: absolute;
  bottom: -100px;
  left: 0;
  transition: all 0.5s ease 0s;
}

</style>
    <div class="container">
        <h3 class="column-title">Dewan Direksi</h3>
            <div>
              <p> <strong>SUSUNAN PENGURUS, PENGAWAS DAN PENGELOLA KSPPS TMI</strong></p>    
              <br>
              
            </div>
        <div class="row">
            
            
            <div class="container">
              <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <p><strong>JAJARAN PENGURUS</strong></p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <div class="our-team">
                        <div class="picture">
                          <!--<img class="img-fluid" src="https://picsum.photos/130/130?image=1027">-->
                          <img src="assets/ketua.jpg" class="img-fluid">
                        </div>
                        <div class="team-content">
                          <h3 class="name">KETUA</h3>
                          <h4 class="name">DEWI MIRAWATI,SE</h4>
                          
                        </div>
                        <br>
                        <ul class="social">
                          <li>
                              <p style="color:white;font-size:80%;">
                              Accounting &amp; Tax Officer, 2019-2024
                              General Manager PT Surya Pharmasindo 2018-2019
                              Office Manager HWMA Law Offices 2010-2016
                              Finance &amp; Tax PT Share Communication 2007-2010
                              </p>

                          </li>
                          
                        </ul>
                      </div>
                    </div>
                    
                     <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <div class="our-team">
                        <div class="picture">
                           <img src="assets/sekretaris.jpg" class="img-fluid">
                        </div>
                        <div class="team-content">
                          <h3 class="name">SEKRETARIS</h3>
                          <h4 class="name">SAIPUL RACHMAN, SE, MM</h4>
                        </div>
                        <br>
                        <ul class="social">
                          <li>
                              <p style="color:white;font-size:80%;">
                              Dinas Perindustrian dan Perdagangan Kabupaten Tangerang
                              Dosen Fakultas Ekonomi dan Bisnis Universitas Muhammadiyah Tangerang
                              Pembina, Penyuluh dan Fasilitator Pelaku Bisnis Pelaku UMKM, IKM Perdagangan dan Koperasi
                              </p>

                          </li>
                          
                        </ul>
                      </div>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <div class="our-team">
                        <div class="picture">
                           <img src="assets/bendahara.jpg" class="img-fluid">
                        </div>
                        <div class="team-content">
                          <h3 class="name">BENDAHARA</h3>
                          <h4 class="name">SALAHUDIN, M.I.KOM</h4>
                        </div>
                        <br>
                        <ul class="social">
                          <li>
                              <p style="color:white;font-size:80%;">
                              Team Leader Pembiayaan Pensiun Pada Bank Mandiri Taspen 2021-2023
                              Manager Bisnis Pada Bank Banten 2019-2021
                              Kepala Bagian Kredit Konsumer Pada Bank Woori Saudara 2015-2017

                              </p>

                          </li>
                          
                        </ul>
                      </div>
                    </div>
                   
                    
                 
                </div>
              
            </div>
            <hr>
            <div class="container">
              <div class="row">
                   
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <p><strong>JAJARAN PENGAWAS</strong></p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <div class="our-team">
                        <div class="picture">
                          <!--<img class="img-fluid" src="https://picsum.photos/130/130?image=1027">-->
                          <img src="assets/pengawas1.jpg" class="img-fluid">
                        </div>
                        <div class="team-content">
                          <h3 class="name">KETUA PENGAWAS</h3>
                          <h4 class="name">FAHLEWI HUSIN NASUTION ,SE</h4>
                          
                        </div>
                        <br>
                        <ul class="social">
                          <li>
                              <p style="color:white;font-size:80%;">
                              Deputy Group Head Consumer Finance Pada Bank Syariah Indonesia 2022-2023
                              Division Head Pada Bank Mandiri Taspen 2015-2022
                              Direktur Pada Bank Yudha Bakti 2017-2018
                              Vice President Pada Bank Mandiri 2013-2015
                              </p>

                          </li>
                          
                        </ul>
                      </div>
                    </div>
                    
                     <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <div class="our-team">
                        <div class="picture">
                           <img src="assets/pengawas2.jpg" class="img-fluid">
                        </div>
                        <div class="team-content">
                          <h3 class="name">ANGGOTA PENGAWAS</h3>
                          <h4 class="name">ARIEF RACHMAN,SE, M.SI</h4>
                        </div>
                        <br>
                        <ul class="social">
                          <li>
                              <p style="color:white;font-size:60%;">
                              Kasi Permodalan &amp; Jasa Keuangan Dinas Koperasi &amp; UMKM Provinsi Banten 2008-2017
                              Kasi Penguatan dan Perlindungan Koperasi 2017-2021
                              Kepala Bidang Kelembagaan dan Pengawasan Dinas Koperasi dan UMKM Provinsi Banten 2021-2023
                              Sekretaris Dinas Koperasi dan UMKM Prov Banten 2023 sd Sekarang
                              </p>

                          </li>
                          
                        </ul>
                      </div>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <div class="our-team">
                        <div class="picture">
                           <img src="assets/pengawas3.jpg" class="img-fluid">
                        </div>
                        <div class="team-content">
                          <h3 class="name">ANGGOTA PENGAWAS</h3>
                          <h4 class="name">HJ NUR'AINI, ST, MM</h4>
                        </div>
                        <br>
                        <ul class="social">
                          <li>
                              <p style="color:white;font-size:80%;">
                              Dinas Perindustrian Perdagangan Koperasi dan Pariwisata Kabupaten Tangerang 2007
                              Komisaris CV Aneka Motor Presisi 2010
                              Sekretaris Koperasi Abdi Kerta Raharja
                              Ketua Konsumen Koperasi Niaga Abdi Kerta Raharja
                              Ketua Koperasi Banten Mikro Indonesia
                              </p>

                          </li>
                          
                        </ul>
                      </div>
                    </div>
                   
                    
                 
                </div>
              
            </div>
                      
                        
        </div>
    </div><!-- Container end -->
</section><!-- Main container end -->

<!-- Header -->
@include('layouts.footer')