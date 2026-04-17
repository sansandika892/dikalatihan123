@extends('master')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h1 class="fw-bold text-dark mb-1">🏨 Hotel Management</h1>
            <p class="text-muted mb-0">Manage hotel data professionally and efficiently.</p>
        </div>

        <a href="/hotels/create" class="btn btn-primary rounded-pill px-4 shadow-sm">
            + Tambah Hotel
        </a>

    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-4 mb-4">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Table Card --}}
    <div class="card border-0 shadow rounded-4 overflow-hidden">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th>Nama Hotel</th>
                        <th>Lokasi</th>
                        <th>Harga / Malam</th>
                        <th>Rating</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($hotels as $no => $hotel)

                    <tr>

                        <td class="px-4 fw-bold text-primary">
                            {{ $no + 1 }}
                        </td>

                        <td class="fw-semibold">
                            {{ $hotel->name }}
                        </td>

                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-2">
                                {{ $hotel->location }}
                            </span>
                        </td>

                        <td class="fw-bold text-success">
                            Rp {{ number_format($hotel->price,0,',','.') }}
                        </td>

                        <td>
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                ⭐ {{ $hotel->rating }}
                            </span>
                        </td>

                        <td class="text-center">

                            <a href="/hotels/{{ $hotel->id }}/edit"
                               class="btn btn-sm btn-warning rounded-pill px-3">
                                Edit
                            </a>

                            <form action="/hotels/{{ $hotel->id }}/delete"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger rounded-pill px-3"
                                        onclick="return confirm('Hapus hotel {{ $hotel->name }} ?')">
                                    Hapus
                                </button>
                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-5">

                            <h4 class="text-muted">Belum ada data hotel</h4>
                            <p class="text-muted">Silakan tambahkan hotel baru.</p>

                            <a href="/hotels/create"
                               class="btn btn-primary rounded-pill px-4">
                                + Tambah Hotel
                            </a>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection