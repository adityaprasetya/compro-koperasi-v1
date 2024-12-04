<!-- Header -->
@include('admin.layouts.header')
  
  <!-- Sidebar -->
  @include('admin.layouts.sidebar')
  
  <main class="main-content position-relative border-radius-lg ">
    
  <!-- Navbar -->
  @include('admin.layouts.navbar')

    <div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tambah Slider</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Slide 1 -->
                        <div class="col-md-4 mb-3">
                            <label for="image1" class="form-label">Slide 1</label>
                            <input type="file" name="image1" class="form-control" id="image1" accept="image/*" required>
                            @error('image1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slide 2 -->
                        <div class="col-md-4 mb-3">
                            <label for="image2" class="form-label">Slide 2</label>
                            <input type="file" name="image2" class="form-control" id="image2" accept="image/*" required>
                            @error('image2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slide 3 -->
                        <div class="col-md-4 mb-3">
                            <label for="image3" class="form-label">Slide 3</label>
                            <input type="file" name="image3" class="form-control" id="image3" accept="image/*" required>
                            @error('image3')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
      
      <!-- Footer -->
      @include('admin.layouts.footer')

    </div>
  </main>
  
  <!-- Customize -->
  @include('admin.layouts.customize')

  <!--   Core JS Files   -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.1.0"></script>

</body>

</html>