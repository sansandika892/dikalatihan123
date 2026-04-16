@extends('master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-warning text-dark text-center">
                <h4>Edit Destinasi</h4>
            </div>

            <div class="card-body p-4">
                <form action="/destinations/{{ $destination->id }}/update" method="post">
                    @csrf



                    <div class="mb-3">
                        <label class="form-label">Destination</label>
                        <select name="destination_id" class="form-select @error('destination_id') is    -invalid @enderror"
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
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

























                    @method('put')

                    <div class="mb-3">
                        <label class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" name="name" value="{{ $destination->name }}"
                            placeholder="Contoh: Asia Heritage">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi">{{ $destination->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="location" value="{{ $destination->location }}"
                            placeholder="Contoh: Pekanbaru">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Tiket</label>
                        <input type="number" class="form-control" name="ticket_price"
                            value="{{ $destination->ticket_price }}" placeholder="Contoh: 100000">

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Operasional</label>
                            <input type="text" class="form-control" name="working_hours"
                                value="{{ $destination->working_hours }}" placeholder="08.00 - 16.00">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hari Operasional</label>
                            <input type="text" class="form-control" name="working_days"
                                value="{{ $destination->working_days }}" placeholder="Senin - Minggu">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/destinations" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
