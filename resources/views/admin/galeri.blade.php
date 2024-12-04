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
              <h6>Galeri</h6>
            </div>
            <div class="col-11 text-end">
                <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#tambahGaleriModal">
                    <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Galeri
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dibuat</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($galeris as $index => $galeri)
        <tr>
            <td>
                <div class="d-flex px-2 py-1">
                    <div>{{ $index + 1 }}</div> <!-- Menampilkan nomor urut -->
                </div>
            </td>
            <td>
                <div class="d-flex px-2 py-1">
                    <div>
                        @if ($galeri->image)
                            <img src="{{ url('storage/galeri/' . $galeri->image) }}" alt="Gambar Galeri" style="width: 100px; height: auto;">
                        @else
                            <img src="https://via.placeholder.com/100x100?text=No+Image" alt="Placeholder Image" style="width: 100px; height: auto;">
                        @endif
                    </div>
                </div>
            </td>
            <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($galeri->created_at)->format('d/m/y H:i') }}</span> <!-- Menampilkan tanggal pembuatan -->
            </td>
            <td class="align-middle">
                <!-- Tombol Hapus -->
                <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="badge badge-sm bg-gradient-danger" data-toggle="tooltip" data-original-title="Hapus gambar">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

              </div>
            </div>

<!-- Modal untuk Tambah Gambar Galeri -->
<div class="modal fade" id="tambahGaleriModal" tabindex="-1" aria-labelledby="tambahGaleriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahGaleriModalLabel">Tambah Gambar Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data"> <!-- Menambahkan enctype untuk mengupload file -->
                    @csrf

                    <!-- Input Gambar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Galeri</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

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