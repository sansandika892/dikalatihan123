@extends('master')

@section('content')

<div class="container mt-4">

<h2>Review Pengunjung</h2>

<a href="/review/create" class="btn btn-primary mb-3">
Tambah Review
</a>

@foreach($reviews as $review)

<div class="card mb-3">
    <div class="card-body">
        <h5>{{ $review->name }}</h5>
        <p>{{ $review->comment }}</p>
        ⭐ {{ $review->rating }}/5
    </div>
</div>

@endforeach

</div>

@endsection