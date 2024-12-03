<!-- Header -->
@include('admin.layouts.header')

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  
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
              <h6>Blog</h6>
            </div>
            <div class="col-11 text-end">
                <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                    <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Blog
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">



              </div>
            </div>

            <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('daftaradmin.post') }}">
                                @csrf
                                <!-- Input Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Input Username -->
                                <!-- <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                                    @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> -->
                                
                                <!-- Input Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Input Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Input Confirm Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                </div>
                                
                                <!-- Input Phone -->
                                <!-- <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon" value="{{ old('phone') }}">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> -->

                                <!-- Dropdown Role (Murid / Guru) -->
                                <!-- <div class="mb-3">
                                    <label for="role" class="form-label">Pilih Peran</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="" disabled selected>Pilih Peran</option>
                                        <option value="murid">Murid</option>
                                        <option value="guru">Guru</option>
                                    </select>
                                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> -->
                                
                                <!-- Submit Button -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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