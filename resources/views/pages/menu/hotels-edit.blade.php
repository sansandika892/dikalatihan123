@extends('master')

@section('content')

<div class="container-fluid py-5 position-relative"
     style="
     background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600&q=80');
     background-size: cover;
     background-position: center;
     background-attachment: fixed;
     min-height: 100vh;">

    {{-- Dark Overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: rgba(0,0,0,0.55); z-index:0;"></div>

    <div class="container position-relative" style="z-index:1;">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white bg-opacity-95">

                    {{-- Header --}}
                    <div class="bg-primary text-white p-4">
                        <h2 class="mb-1 fw-bold">🏨 Edit Hotel</h2>
                        <p class="mb-0 opacity-75">
                            Perbarui informasi hotel dengan mudah dan profesional.
                        </p>
                    </div>

                    {{-- Body --}}
                    <div class="card-body p-4">

                        <form action="/hotels/{{ $hotel->id }}/update" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Nama Hotel --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Hotel</label>
                                <input type="text"
                                       name="name"
                                       value="{{ $hotel->name }}"
                                       class="form-control rounded-3"
                                       placeholder="Masukkan nama hotel">
                            </div>

                            {{-- Lokasi --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Lokasi</label>
                                <input type="text"
                                       name="location"
                                       value="{{ $hotel->location }}"
                                       class="form-control rounded-3"
                                       placeholder="Masukkan lokasi hotel">
                            </div>

                            {{-- Harga --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Harga / Malam</label>
                                <input type="number"
                                       name="price"
                                       value="{{ $hotel->price }}"
                                       class="form-control rounded-3"
                                       placeholder="Masukkan harga">
                            </div>

                            {{-- Rating --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Rating</label>
                                <input type="text"
                                       name="rating"
                                       value="{{ $hotel->rating }}"
                                       class="form-control rounded-3"
                                       placeholder="Contoh: 4.8">
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="description"
                                          rows="4"
                                          class="form-control rounded-3"
                                          placeholder="Masukkan deskripsi hotel">{{ $hotel->description }}</textarea>
                            </div>

                            {{-- Button --}}
                            <div class="d-flex justify-content-between">

                                <a href="/hotels"
                                   class="btn btn-light border rounded-pill px-4">
                                    ← Kembali
                                </a>

                                <button type="submit"
                                        class="btn btn-primary rounded-pill px-4 shadow-sm">
                                    💾 Update Hotel
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection