@extends('master')

@section('content')
<style>
    body{
        background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        min-height: 100vh;
    }

    .destination-card{
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .left-banner{
        background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') center center/cover no-repeat;
        min-height: 100%;
        position: relative;
    }

    .left-banner::before{
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
    }

    .banner-content{
        position: relative;
        z-index: 2;
        color: white;
        padding: 40px;
    }

    .form-title{
        font-weight: bold;
        color: #0d6efd;
    }

    .form-control{
        border-radius: 12px;
        padding: 12px;
    }

    .btn-custom{
        border-radius: 12px;
        padding: 10px 25px;
        font-weight: 600;
    }

    .icon-box{
        width: 45px;
        height: 45px;
        background: #0d6efd;
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }
</style>

<div class="container py-5">

    @if ($errors->any())
        <div class="alert alert-danger rounded-3 shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card destination-card">
        <div class="row g-0">

            <!-- KIRI GAMBAR -->
            <div class="col-md-5">
                <div class="left-banner d-flex align-items-center">
                    <div class="banner-content">
                        <h2 class="fw-bold">Tambah Destinasi Wisata</h2>
                        <p class="mt-3">
                            Lengkapi data destinasi wisata terbaik di Pekanbaru agar
                            pengunjung mudah menemukan tempat menarik.
                        </p>
                    </div>
                </div>
            </div>

            <!-- KANAN FORM -->
            <div class="col-md-7 bg-white">
                <div class="p-5">

                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box me-3">
                            📍
                        </div>
                        <div>
                            <h3 class="form-title mb-0">Form Destinasi</h3>
                            <small class="text-muted">Isi data dengan lengkap</small>
                        </div>
                    </div>

                    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Destinasi</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Contoh: Asia Heritage"
                                value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" rows="3" class="form-control"
                                placeholder="Masukkan deskripsi">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-control"
                                placeholder="Contoh: Pekanbaru"
                                value="{{ old('location') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Tiket</label>
                            <input type="number" name="ticket_price" class="form-control"
                                placeholder="Contoh: 100000"
                                value="{{ old('ticket_price') }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jam Operasional</label>
                                <input type="text" name="working_hours" class="form-control"
                                    placeholder="08.00 - 16.00"
                                    value="{{ old('working_hours') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hari Operasional</label>
                                <input type="text" name="working_days" class="form-control"
                                    placeholder="Senin - Minggu"
                                    value="{{ old('working_days') }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Upload Gambar</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/destinations" class="btn btn-secondary btn-custom">
                                ← Kembali
                            </a>

                            <button type="submit" class="btn btn-primary btn-custom">
                                Simpan Destinasi
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection