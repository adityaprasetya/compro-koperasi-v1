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
              <h6>Blog</h6>
            </div>
            <div class="col-11 text-end">
                <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#tambahBlogModal">
                    <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Blog
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Blog</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dibuat</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $index => $blog)
        <tr>
            <td>
                <div class="d-flex px-2 py-1">
                    <div>{{ $index + 1 }}</div> <!-- Menampilkan nomor urut -->
                </div>
            </td>
            <td>
                <div class="d-flex px-2 py-1">
                    <div>
                    @if ($blog->image)
                        <img src="{{ url('storage/images/' . $blog->image) }}" alt="Gambar Blog" style="width: 100px; height: auto;">
                    @else
                        <span class="text-secondary">Tidak ada gambar</span>
                    @endif
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $blog->title }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ substr($blog->content, 0, 100) }}...</p> <!-- Menampilkan potongan konten -->
                    </div>
                </div>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{ $blog->author->name }}</p> <!-- Menampilkan nama penulis -->
                <p class="text-xs text-secondary mb-0">{{ $blog->author->email }}</p>
            </td>
            <td class="align-middle text-center text-sm">
                <span class="badge badge-sm bg-gradient-success">{{ $blog->status == 1 ? 'Online' : 'Offline' }}</span> <!-- Status blog -->
            </td>
            <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold">{{ $blog->created_at->format('d/m/y') }}</span>
            </td>
            <td class="align-middle">
                <!-- Tombol Ubah -->
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBlogModal" 
                    data-id="{{ $blog->id }}" 
                    data-title="{{ $blog->title }}"
                    data-content="{{ $blog->content }}"
                    data-image="{{ $blog->image }}">
                    Ubah
                </button>
                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="badge badge-sm bg-gradient-danger" data-toggle="tooltip" data-original-title="Hapus blog">
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

<!-- Modal untuk Tambah Blog -->
<div class="modal fade" id="tambahBlogModal" tabindex="-1" aria-labelledby="tambahBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBlogModalLabel">Tambah Blog Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
                    @csrf
                    <!-- Input Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Blog</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul Blog" value="{{ old('title') }}" required>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Input Content -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten Blog</label>
                        <textarea class="form-control" id="content" name="content" placeholder="Konten Blog" rows="4" required>{{ old('content') }}</textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Blog</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Penulis (Di-set otomatis sesuai yang login) -->
                    <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">

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

<!-- Modal untuk Edit Blog -->
<div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBlogModalLabel">Ubah Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('blog.update', ':id') }}" enctype="multipart/form-data" id="editBlogForm"> <!-- Ubah route dan id form -->
                    @csrf
                    @method('PUT')

                    <!-- Input Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Blog</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul Blog" value="{{ old('title') }}" required>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Input Content -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten Blog</label>
                        <textarea class="form-control" id="content" name="content" placeholder="Konten Blog" rows="4" required>{{ old('content') }}</textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Blog</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Penulis (Di-set otomatis sesuai yang login) -->
                    <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
    // Ketika tombol "Ubah" diklik
    $('#editBlogModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang diklik
        var id = button.data('id');
        var title = button.data('title');
        var content = button.data('content');
        var image = button.data('image');

        var modal = $(this);
        modal.find('#title').val(title);  // Set nilai input title
        modal.find('#content').val(content);  // Set nilai input content
        modal.find('#image').val(''); // Biarkan input file kosong

        // Mengubah form action untuk menggunakan ID yang dipilih
        var action = '{{ route("blog.update", ":id") }}';
        action = action.replace(':id', id);
        modal.find('#editBlogForm').attr('action', action); // Update form action
    });
</script>

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