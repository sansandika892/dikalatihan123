<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-warning" href="/">
            WISATA ANAK PKU
        </a>

        <!-- Tombol Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-2">

                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/destinations">Destinations</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/attractions">Attraction</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/packages">Packages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/hotels">Hotels</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/about">About</a>
                </li>

                <!-- Dropdown Admin -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                        Admin
                    </a>
                <li class="nav-item">
                    <a class="nav-link" href="/hotels">Hotels</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/review">Review</a>
                </li>



                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/login">Login</a></li>
                    <li><a class="dropdown-item" href="/register">Register</a></li>
                </ul>
                </li>
<form action="{{route('logout')}}"method="POST" >
@csrf
<button type="submit"class="btn btn-outline-light rounded-pill px-4 fw-bold">logout</button>
</form>

            </ul>
        </div>

    </div>
</nav>
