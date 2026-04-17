@extends('master')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- Cover Image --}}
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80"
                     class="img-fluid"
                     style="height:320px; object-fit:cover;"
                     alt="Attraction">

                {{-- Header --}}
                <div class="card-header bg-white border-0 px-4 py-4">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div>
                            <h2 class="fw-bold text-primary mb-1">
                                {{ $attraction->name }}
                            </h2>

                            <p class="text-muted mb-0">
                                Beautiful tourism attraction destination
                            </p>
                        </div>

                        <div>

                            <a href="{{ route('attractions.edit', $attraction->id) }}"
                               class="btn btn-warning rounded-pill px-4">
                                Edit
                            </a>

                            <a href="{{ route('attractions.index') }}"
                               class="btn btn-outline-secondary rounded-pill px-4">
                                Back
                            </a>

                        </div>

                    </div>

                </div>

                {{-- Body --}}
                <div class="card-body px-4 py-4">

                    <div class="row g-4">

                        {{-- Left --}}
                        <div class="col-md-6">

                            <div class="card border-0 bg-light rounded-4 p-4 h-100">

                                <h5 class="fw-bold mb-3">📍 Destination Info</h5>

                                <p class="mb-3">
                                    <strong>Destination:</strong><br>
                                    {{ $attraction->destination->name ?? 'No Destination Available' }}
                                </p>

                                <p class="mb-3">
                                    <strong>Attraction ID:</strong><br>
                                    #{{ $attraction->id }}
                                </p>

                                <p class="mb-0">
                                    <strong>Created At:</strong><br>
                                    {{ $attraction->created_at->format('d M Y H:i') }}
                                </p>

                            </div>

                        </div>

                        {{-- Right --}}
                        <div class="col-md-6">

                            <div class="card border-0 bg-light rounded-4 p-4 h-100">

                                <h5 class="fw-bold mb-3">📝 Description</h5>

                                <p class="text-muted">
                                    {{ $attraction->description ?? 'No description available.' }}
                                </p>

                                <hr>

                                <p class="mb-0">
                                    <strong>Updated At:</strong><br>
                                    {{ $attraction->updated_at->format('d M Y H:i') }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer bg-white border-0 text-end px-4 py-3">

                    <a href="{{ route('attractions.index') }}"
                       class="btn btn-primary rounded-pill px-4">
                        ← Back to Attractions
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection