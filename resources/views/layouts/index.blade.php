<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    
    <!-- Tailwind CDN !-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class='sticky top-0 flex shadow-lg py-4 px-4 sm:px-10 bg-white font-[sans-serif] min-h-[70px] tracking-wide z-50'>
        @include('layouts.header')
    </header>

    <main class="min-h-screen mx-auto mt-8">
        @yield('content')
    </main>

    <footer class="font-sans tracking-wide bg-gray-50 px-10 pt-12 pb-6">
        @include('layouts.footer')
    </footer>
    
    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('posterPreview');
            const currentPoster = document.getElementById('currentPoster');
            const file = fileInput.files[0];
    
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
    
                    // Sembunyikan poster lama jika ada
                    if (currentPoster) {
                        currentPoster.style.display = 'none';
                    }
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
    
                // Tampilkan poster lama kembali jika file dihapus
                if (currentPoster) {
                    currentPoster.style.display = 'block';
                }
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.delete-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const form = this.closest('.delete-form'); // Mendapatkan form terdekat
                const movieTitle = this.dataset.movieTitle; // Mengambil judul film dari data-movie-title

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to delete "${movieTitle}". This action cannot be undone.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Mengirim form setelah konfirmasi
                    }
                });
            });
        });
    </script>

    
</body>
</html>