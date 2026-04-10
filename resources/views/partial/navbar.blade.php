<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">
            <i class="bi bi-geo-alt-fill me-2"></i>MyTravel
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item px-2">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-light rounded-pill px-4 fw-bold text-primary" href="#">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('styles')
<style>
    /* Efek Hover untuk Link */
    .nav-link {
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .nav-link:hover {
        color: #ffca2c !important;
        /* Warna kuning saat hover agar menarik */
        transform: translateY(-2px);
    }

    /* Navbar transparan sedikit kalau mau lebih mewah */
    .navbar {
        backdrop-filter: blur(10px);
        background: linear-gradient(90deg, #0d6efd 0%, #0a58ca 100%) !important;
    }

</style>


@endpush
