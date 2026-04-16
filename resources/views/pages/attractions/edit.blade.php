@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Edit Attraction</h3>
                    <a href="{{ route('attractions.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('attractions.update', $attraction->id) }}" method="POST">
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

























                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $attraction->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" required>{{ old('description', $attraction->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Attraction</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
