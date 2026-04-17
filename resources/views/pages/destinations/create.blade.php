@extends('master')

@section('content')
    <div class="container mt-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    {{ session('success') }}
            </div>
        @endif



        <form action="{{ route('destinations.store') }}" method="post" enctype="multipart/form-data">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-primary text-white text-center">
                <h4>Tambah Destinasi</h4>
            </div>

            <div class="card-body p-4">
                <form action="/destinations" method="post">
                    @csrf




                    <div class="mb-3">
                        <label class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" name="name" placeholder="Contoh: Asia Heritage"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi">{{ old('description') }}</textarea>
                        <div class="col-12">

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="location" placeholder="Contoh: Pekanbaru"
                            value="{{ old('location') }}">


                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Tiket</label>
                        <input type="number" class="form-control" name="ticket_price" placeholder="Contoh: 100000"
                            value="{{ old('ticket_price') }}">


                        @error('ticket_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Operasional</label>
                            <input type="text" class="form-control" name="working_hours" placeholder="08.00 - 16.00"
                                value="{{ old('working_hours') }}">


                            @error('working_hours')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hari Operasional</label>
                            <input type="text" class="form-control" name="working_days" placeholder="Senin - Minggu"
                                value="{{ old('working_days') }}">


                            @error('working_days')
                                <div class="invalid-feedback">{{ $message }}</div value="{{ old('working_days') }}">
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/destinations" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
