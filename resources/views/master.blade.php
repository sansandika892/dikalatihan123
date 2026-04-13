<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Destinasi Wisata' }} | MyTravel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Agar footer tetap di bawah */
        }

        main {
            flex: 1;
            /* Mengisi ruang kosong antara navbar dan footer */
        }

        /* Memperhalus tampilan card dari gambar yang Anda lampirkan */
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            border-radius: 12px;
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
        }

    </style>

    @stack('styles') {{-- Untuk CSS tambahan di halaman tertentu --}}
</head>
<body>

    <header shadow-sm>
        @include('partial.navbar')
    </header>

    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="mt-auto">
        @include('partial.footer')
    </footer>


     @stack('scripts') {{-- Untuk JS tambahan di halaman tertentu --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>
