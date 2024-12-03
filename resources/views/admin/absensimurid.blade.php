<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menampilkan SweetAlert2 saat halaman load
        Swal.fire({
            title: 'Pilih Status Absensi',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sakit',
            cancelButtonText: 'Izin',
            preConfirm: () => {
                // Menentukan status absensi berdasarkan tombol yang dipilih
                let status = '';
                if (Swal.getConfirmButton()) {
                    status = 'Sakit';
                } else if (Swal.getCancelButton()) {
                    status = 'Izin';
                }
                return status;
            },
            didClose: () => {
                

                // Arahkan ke halaman dashboard
                window.location.href = '/dashboard'; // Ganti dengan URL dashboard Anda
            }
        });
    });
</script>
