@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $attraction->name }}</h2>
                    <div>
                        <a href="{{ route('attractions.edit', $attraction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('attractions.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $attraction->id }}</p>
                    <p><strong>Description:</strong></p>
                    <p>{{ $attraction->description }}</p>
                    <p><strong>Created:</strong> {{ $attraction->created_at->format('Y-m-d H:i') }}</p>
                    <p><strong>Updated:</strong> {{ $attraction->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
