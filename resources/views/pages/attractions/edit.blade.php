@extends('master')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- Header --}}
                <div class="bg-primary text-white p-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h2 class="fw-bold mb-1">🎯 Edit Attraction</h2>
                        <p class="mb-0 opacity-75">Update attraction information professionally.</p>
                    </div>

                    <a href="{{ route('attractions.index') }}"
                       class="btn btn-light btn-sm rounded-pill px-4">
                        ← Back
                    </a>
                </div>

                {{-- Body --}}
                <div class="card-body p-5">

                    <form action="{{ route('attractions.update', $attraction->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Destination --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Destination</label>

                            <select name="destination_id"
                                class="form-select rounded-3 @error('destination_id') is-invalid @enderror"
                                required>

                                <option value="">Select Destination</option>

                                @foreach ($destinations as $destination)

                                    <option value="{{ $destination->id }}"
                                        {{ old('destination_id', $attraction->destination_id) == $destination->id ? 'selected' : '' }}>
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
                                   value="{{ old('name', $attraction->name) }}"
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
                                      placeholder="Enter attraction description"
                                      required>{{ old('description', $attraction->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('attractions.index') }}"
                               class="btn btn-outline-secondary rounded-pill px-4">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="btn btn-primary rounded-pill px-4 shadow-sm">
                                💾 Update Attraction
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection