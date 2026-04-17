@extends('master')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="row g-0">

                    {{-- Left Image --}}
                    <div class="col-md-5 d-none d-md-block">

                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=900&q=80"
                             class="img-fluid h-100 w-100 object-fit-cover"
                             style="min-height:100%;"
                             alt="Tourism">

                    </div>

                    {{-- Right Form --}}
                    <div class="col-md-7">

                        <div class="p-5">

                            {{-- Header --}}
                            <div class="mb-4">
                                <h2 class="fw-bold text-primary mb-2">🌍 Create New Attraction</h2>
                                <p class="text-muted mb-0">
                                    Add a beautiful tourist attraction to your destination list.
                                </p>
                            </div>

                            <form action="{{ route('attractions.store') }}" method="POST">
                                @csrf

                                {{-- Destination --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Destination</label>

                                    <select name="destination_id"
                                        class="form-select rounded-3 @error('destination_id') is-invalid @enderror"
                                        required>

                                        <option value="">Select Destination</option>

                                        @foreach ($destinations as $destination)

                                            <option value="{{ $destination->id }}"
                                                {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                                                {{ $destination->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('destination_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Name --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Attraction Name</label>

                                    <input type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control rounded-3 @error('name') is-invalid @enderror"
                                           placeholder="Enter attraction name"
                                           required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Description</label>

                                    <textarea name="description"
                                              rows="5"
                                              class="form-control rounded-3 @error('description') is-invalid @enderror"
                                              placeholder="Write attraction description..."
                                              required>{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Buttons --}}
                                <div class="d-flex justify-content-between mt-4">

                                    <a href="{{ route('attractions.index') }}"
                                       class="btn btn-outline-secondary rounded-pill px-4">
                                        Cancel
                                    </a>

                                    <button type="submit"
                                            class="btn btn-primary rounded-pill px-4 shadow-sm">
                                        ✨ Create Attraction
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection