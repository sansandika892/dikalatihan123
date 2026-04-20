@extends('master')

@section('content')

<style>
    body{
        background: linear-gradient(135deg,#eef2f7,#dbeafe);
        min-height: 100vh;
    }

    .main-card{
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(0,0,0,.12);
    }

    .left-image{
        background: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e') center center/cover no-repeat;
        min-height: 100%;
        position: relative;
    }

    .left-image::before{
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,.45);
    }

    .overlay-content{
        position: relative;
        z-index: 2;
        color: #fff;
        padding: 45px 35px;
    }

    .overlay-content h2{
        font-weight: 700;
        margin-bottom: 15px;
    }

    .right-form{
        background: #fff;
    }

    .title-edit{
        color: #0d6efd;
        font-weight: 700;
    }

    .form-control,
    .form-select{
        border-radius: 14px;
        padding: 12px 15px;
    }

    .form-control:focus,
    .form-select:focus{
        box-shadow: 0 0 0 .2rem rgba(13,110,253,.15);
        border-color: #0d6efd;
    }

    .btn-custom{
        border-radius: 50px;
        padding: 10px 24px;
        font-weight: 600;
    }

    .icon-box{
        width: 50px;
        height: 50px;
        border-radius: 14px;
        background: #0d6efd;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-xl-11">

            <div class="card main-card">
                <div class="row g-0">

                    <!-- LEFT IMAGE -->
                    <div class="col-lg-5">
                        <div class="left-image h-100 d-flex align-items-center">
                            <div class="overlay-content">
                                <h2>🎯 Edit Attraction</h2>
                                <p class="mb-0">
                                    Perbarui data attraction agar lebih menarik,
                                    informatif, dan profesional untuk pengunjung.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT FORM -->
                    <div class="col-lg-7 right-form">
                        <div class="p-5">

                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-box me-3">✏️</div>
                                <div>
                                    <h3 class="title-edit mb-0">Update Attraction</h3>
                                    <small class="text-muted">
                                        Edit informasi attraction dengan lengkap
                                    </small>
                                </div>
                            </div>

                            <form action="{{ route('attractions.update', $attraction->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Destination -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Destination</label>

                                    <select name="destination_id"
                                        class="form-select @error('destination_id') is-invalid @enderror"
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

                                <!-- Name -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Attraction Name</label>

                                    <input type="text"
                                        name="name"
                                        value="{{ old('name', $attraction->name) }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter attraction name"
                                        required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Description</label>

                                    <textarea name="description"
                                        rows="5"
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter attraction description"
                                        required>{{ old('description', $attraction->description) }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between pt-2">

                                    <a href="{{ route('attractions.index') }}"
                                        class="btn btn-outline-secondary btn-custom">
                                        ← Back
                                    </a>

                                    <button type="submit"
                                        class="btn btn-primary btn-custom shadow-sm">
                                        💾 Update Attraction
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