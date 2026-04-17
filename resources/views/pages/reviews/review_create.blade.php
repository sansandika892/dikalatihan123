@extends('master')

@section('content')

<div class="container mt-4">

<h2>Tambah Review</h2>

<form action="/review/store" method="post">
@csrf

<div class="mb-3">
                                <label class="form-label">Attraction</label>
                                <select name="attraction_id"
                                    class="form-select @error('attraction_id') is-invalid @enderror" required>
                                    <option value="">Select Attraction</option>
                                    @foreach ($attractions as $attraction)
                                        <option value="{{ $attraction->id }}"
                                            {{ old('attraction_id') == $attraction->id ? 'selected' : '' }}>
                                            {{ $attraction->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('attraction_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


<div class="mb-3">
<label>Nama</label>
<input type="text" name="reviewer_name" class="form-control">
</div>

<div class="mb-3">
<label>Komentar</label>
<textarea name="comment" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Rating</label>
<input type="number" name="rating" min="1" max="5" class="form-control">
</div>

<button class="btn btn-success">Simpan</button>

</form>

</div>

@endsection