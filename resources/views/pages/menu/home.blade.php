@extends('master')

@section('content')
<div class="container py-5">

    <!-- HERO SECTION -->
    <div class="text-center p-5 mb-5 bg-light rounded shadow-sm">
        <h1 class="fw-bold">Welcome to Our Travel Guide!</h1>
        <p class="text-muted">
            Discover the best destinations and attractions around the world with us.
        </p>
        <a href="#" class="btn btn-primary me-2">Explore Destinations</a>
        <a href="#" class="btn btn-secondary">Explore Attractions</a>
    </div>

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold">Our Destinations</h2>
    </div>

    <!-- DESTINATIONS -->
    <div class="row">
        @forelse ($destinations as $d)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">

                    <!-- IMAGE -->
                    <img src="{{ $d->image ?? 'https://wallpapercave.com/wp/wp2973184.jpg' }}" 
                         class="card-img-top" 
                         style="height: 200px; object-fit: cover;"
                         alt="{{ $d->name }}">



                          <img src="{{ $d->image ?? 'https://wallpapercave.com/wp/wp2973184.jpg' }}" 
                         class="card-img-top" 
                         style="height: 200px; object-fit: cover;"
                         alt="{{ $d->name }}">

                    <!-- CONTENT -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $d->name }}</h5>

                        <p class="card-text text-muted">
                            {{ Str::limit($d->description, 100) }}
                        </p>

                        <!-- BUTTON -->
                        <div class="mt-auto">
                            <a href="{{ route('destinations.show', $d->id) }}" 
                               class="btn btn-primary w-100">
                               View Details
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <!-- kalau data kosong -->
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No destinations available yet.
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection