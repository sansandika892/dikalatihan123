@extends('master')

@section('content')

<div class="container-fluid p-0">

    {{-- HERO SECTION --}}
    <section class="position-relative overflow-hidden"
        style="
        background-image:url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1800&q=80');
        background-size:cover;
        background-position:center;
        min-height:100vh;">

        {{-- Dark Overlay --}}
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background:linear-gradient(to right, rgba(0,0,0,.75), rgba(0,0,0,.45));">
        </div>

        {{-- Content --}}
        <div class="container position-relative text-white d-flex align-items-center"
             style="min-height:100vh; z-index:2;">

            <div class="col-lg-7">

                <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">
                    Premium Travel Guide
                </span>

                <h1 class="display-3 fw-bold mb-4">
                    Discover The World's <br>
                    Best Destinations
                </h1>

                <p class="lead text-light mb-4">
                    Explore breathtaking places, amazing attractions,
                    and unforgettable travel experiences with our professional guide.
                </p>

                <div class="d-flex flex-wrap gap-3">

                    <a href="#destinations"
                       class="btn btn-primary btn-lg rounded-pill px-4 shadow">
                        Explore Now
                    </a>

                    <a href="/attractions"
                       class="btn btn-outline-light btn-lg rounded-pill px-4">
                        View Attractions
                    </a>

                </div>

            </div>

        </div>

    </section>

    {{-- DESTINATION SECTION --}}
    <section class="py-5"
        style="
        background-image:url('https://images.unsplash.com/photo-1527631746610-bca00a040d60?auto=format&fit=crop&w=1800&q=80');
        background-size:cover;
        background-position:center;
        position:relative;">

        {{-- Overlay --}}
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background:rgba(255,255,255,.92);"></div>

        <div class="container position-relative" style="z-index:2;" id="destinations">

            {{-- Title --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6">🌍 Featured Destinations</h2>
                <p class="text-muted">
                    Handpicked travel locations for your next unforgettable journey.
                </p>
            </div>

            {{-- Cards --}}
            <div class="row">

                @forelse ($destinations as $d)

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">

                            {{-- Image --}}
                            <img src="{{ $d->image ?? 'https://wallpapercave.com/wp/wp2973184.jpg' }}"
                                 class="card-img-top"
                                 style="height:250px; object-fit:cover;"
                                 alt="{{ $d->name }}">

                            {{-- Body --}}
                            <div class="card-body p-4 d-flex flex-column">

                                <h4 class="fw-bold mb-2">
                                    {{ $d->name }}
                                </h4>

                                <p class="text-muted">
                                    {{ Str::limit($d->description, 100) }}
                                </p>

                                <div class="mt-auto">

                                    <a href="{{ route('destinations.show', $d->id) }}"
                                       class="btn btn-primary rounded-pill w-100">
                                        View Details
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-info text-center shadow rounded-4">
                            No destinations available yet.
                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

</div>

@endsection