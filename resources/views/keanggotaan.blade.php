<!-- Header -->
@include('layouts.header')

<body>
    <div class="body-inner">

<!-- Navbar -->
@include('layouts.navbar')

<style>
 { 
  margin : 0;
  padding: 0;
  box-sizing : border-box;
  font-familly : "Poppins", sans-serif;
}
/*body {*/
/*  display : flex;*/
/*  align-items : center;*/
/*  justify-content : center;  */
/*  background-color: #43345d;*/
/*  min-height : 800px;*/
/*}*/

.container {
  position : relative;
  width : 1100px;
  display : flex;
  align-items : center;
  justify-content : center;
  flex-warp : warp;
  padding : 30px;  
}

.container .card {
  position: relative;
  max-width : 300px;
  height : 215px;  
  background-color : #fff;
  margin : 30px 10px;
  padding : 20px 15px;
  
  display : flex;
  flex-direction : column;
  box-shadow : 0 5px 20px rgba(0,0,0,0.5);
  transition : 0.3s ease-in-out;
  border-radius : 15px;
}
.container .card:hover {
  height : 320px;    
}


.container .card .image {
  position : relative;
  width : 260px;
  height : 260px;
  
  top : -40%;
  left: 8px;
  box-shadow : 0 5px 20px rgba(0,0,0,0.2);
  z-index : 1;
}

.container .card .image img {
  max-width : 100%;
  border-radius : 15px;
}

.container .card .content {
  position : relative;
  top : -140px;
  padding : 10px 15px;
  color : #111;
  text-align : center;
  
  visibility : hidden;
  opacity : 0;
  transition : 0.3s ease-in-out;
    
}

.container .card:hover .content {
   margin-top : 30px;
   visibility : visible;
   opacity : 1;
   transition-delay: 0.2s;
  
}
.center {
  text-align: center;
  /*border: 3px solid green;*/
}
   
    
</style>

<section id="main-container" class="main-container">
    <div class="center">
                       <h3 class="column-title">Keanggotaan KSPPS TMI</h3>
                  </div>
         
    <div class="container">
                 
        
        <!--<div class="row">-->
                 
                  <div class="card">
                      
                      <div class="image">
                        
                         <img src="keanggotaan_files/images-form.png" class="img-fluid">
                        <!--<img href = "#" src =https://i.pinimg.com/originals/a4/7b/a5/a47ba59b4a353e0928ef0551ca44f980.jpg>-->
                      </div>
                      <div class="content">
                        <h3>Form</h3>
                        <a href="https://forms.gle/pxL92SeQEhiVwbMr8">Klik link untuk isi Form </a>
                     
                      </div>
                   </div> 
              
                
        <!--</div>-->
        
        
    </div><!-- Container end -->
    
   
</section><!-- Main container end -->

<!-- Footer -->
@include('layouts.footer')