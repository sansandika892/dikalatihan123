@extends('master')

@section('content')
<style>
    body{
        background: linear-gradient(135deg,#eef2f7,#dbeafe);
        min-height: 100vh;
    }

    .edit-card{
        border: none;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 20px 45px rgba(0,0,0,0.12);
    }

    .left-side{
        background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb') center center/cover no-repeat;
        min-height: 100%;
        position: relative;
    }

    .left-side::before{
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
    }

    .left-content{
        position: relative;
        z-index: 2;
        color: white;
        padding: 45px 35px;
    }

    .left-content h2{
        font-weight: 700;
        margin-bottom: 15px;
    }

    .form-section{
        background: #ffffff;
    }

    .form-title{
        color: #f59e0b;
        font-weight: 700;
    }

    .form-control{
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #d1d5db;
    }

    .form-control:focus{
        box-shadow: 0 0 0 0.2rem rgba(245,158,11,.15);
        border-color: #f59e0b;
    }

    .btn-custom{
        padding: 10px 24px;
        border-radius: 12px;
        font-weight: 600;
    }

    .icon-box{
        width: 48px;
        height: 48px;
        background: #f59e0b;
        color: white;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }
</style>

<div class="container py-5">
    <div class="card edit-card">
        <div class="row g-0">

            <!-- BAGIAN GAMBAR -->
            <div class="col-md-5">
                <div class="left-side d-flex align-items-center h-100">
                    <div class="left-content">
                        <h2>Edit Destinasi</h2>
                        <p>
                            Perbarui informasi destinasi wisata agar tetap menarik,
                            lengkap, dan memudahkan pengunjung menemukan tempat terbaik.
                        </p>
                    </div>
                </div>
            </div>

            <!-- BAGIAN FORM -->
            <div class="col-md-7 form-section">
                <div class="p-5">

                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box me-3">✏️</div>
                        <div>
                            <h3 class="form-title mb-0">Update Data Destinasi</h3>
                            <small class="text-muted">Silakan ubah data yang diperlukan</small>
                        </div>
                    </div>

                    <form action="/destinations/{{ $destination->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Destinasi</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ $destination->name }}"
                                placeholder="Contoh: Asia Heritage">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="4"
                                placeholder="Masukkan deskripsi">{{ $destination->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="location"
                                value="{{ $destination->location }}"
                                placeholder="Contoh: Pekanbaru">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Tiket</label>
                            <input type="number" class="form-control" name="ticket_price"
                                value="{{ $destination->ticket_price }}"
                                placeholder="Contoh: 100000">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jam Operasional</label>
                                <input type="text" class="form-control" name="working_hours"
                                    value="{{ $destination->working_hours }}"
                                    placeholder="08.00 - 16.00">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hari Operasional</label>
                                <input type="text" class="form-control" name="working_days"
                                    value="{{ $destination->working_days }}"
                                    placeholder="Senin - Minggu">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Ganti Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/destinations" class="btn btn-secondary btn-custom">
                                ← Kembali
                            </a>

                            <button type="submit" class="btn btn-warning text-dark btn-custom">
                                Update Data
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection