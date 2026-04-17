@extends('master')

@section('content')

<div class="container-fluid py-5 position-relative"
     style="
     background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80');
     background-size: cover;
     background-position: center;
     background-attachment: fixed;
     min-height: 100vh;">

    {{-- Overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: rgba(0,0,0,0.55); z-index:0;"></div>

    <div class="container position-relative" style="z-index:1;">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4 border-0 mb-4">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>
                <h1 class="fw-bold text-white mb-1">🌍 Attractions Management</h1>
                <p class="text-light mb-0">
                    Manage and organize tourist destinations professionally.
                </p>
            </div>

            <a href="{{ route('attractions.create') }}"
               class="btn btn-primary px-4 py-2 rounded-pill shadow">
                + Add New Attraction
            </a>

        </div>

        {{-- Search --}}
        <div class="card border-0 shadow rounded-4 mb-4 bg-white bg-opacity-75">
            <div class="card-body p-4">

                <form action="{{ route('attractions.index') }}" method="GET">

                    <div class="row g-2">

                        <div class="col-md-10">
                            <input type="text"
                                   class="form-control rounded-pill px-4"
                                   placeholder="Search attraction..."
                                   name="search"
                                   value="{{ request('search') }}">
                        </div>

                        <div class="col-md-2 d-grid">
                            <button class="btn btn-outline-primary rounded-pill">
                                Search
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>

        {{-- Table --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white bg-opacity-90">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th>Name</th>
                            <th>Destination</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($attractions as $attraction)

                        <tr>

                            <td class="px-4 fw-bold text-primary">
                                #{{ $attraction->id }}
                            </td>

                            <td class="fw-semibold">
                                {{ $attraction->name }}
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                    {{ $attraction->destination->name ?? 'No Destination' }}
                                </span>
                            </td>

                            <td class="text-muted">
                                {{ Str::limit($attraction->description, 60) }}
                            </td>

                            <td>
                                {{ $attraction->created_at->format('d M Y') }}
                            </td>

                            <td class="text-center">

                                <a href="{{ route('attractions.show', $attraction->id) }}"
                                   class="btn btn-sm btn-outline-info rounded-pill px-3">
                                    View
                                </a>

                                <a href="{{ route('attractions.edit', $attraction->id) }}"
                                   class="btn btn-sm btn-warning rounded-pill px-3">
                                    Edit
                                </a>

                                <form action="{{ route('attractions.destroy', $attraction->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger rounded-pill px-3"
                                            onclick="return confirm('Delete this attraction?')">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center py-5">

                                <h4 class="text-muted">No attractions found</h4>

                                <a href="{{ route('attractions.create') }}"
                                   class="btn btn-primary rounded-pill px-4 mt-2">
                                    + Create First Attraction
                                </a>

                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection