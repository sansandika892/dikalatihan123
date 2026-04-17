@extends('master')

@section('content')
<div class="container py-5">
    
    <div class="card shadow-lg border-0 mb-4">


        <div class="card-body">
            <a href="{{ route('destinations.edit', $destinations->id) }}" class="btn btn-warning rounded-pill px-4 mb-4">
                Edit
            </a>
            <img src="{{ asset('storage/' . $destinations->image) ?? 'https://wallpapercave.com/wp/wp2973184.jpg' }}" 
                 class="card-img-top" 
                 style="height: 350px; object-fit: cover;"> 
                 class='img-fluid'>
                 <h1>{{$destinations->name}}</h1>
                 <p>{{$destinations->description}}</p>
                    <p><strong>📍 Lokasi:</strong><br>
                        <p>{{ $destinations->location }}</p>
                        <p.{{ $destinations->working_days }}</p>
                        <p>{{ $destinations->working_hours }}</p>           
                        <p>{{ $destinations->ticket_price }}</p>
        </div>
                       
                ← Back
        
        {{-- Gambar --}}
        <img src="{{ $d->image ?? 'https://wallpapercave.com/wp/wp2973184.jpg' }}" 
             class="card-img-top" 
             style="height: 350px; object-fit: cover;">

        {{-- Konten --}}
        <div class="card-body">
            <h2 class="fw-bold mb-3">{{ $destinations->name }}</h2>

            <p class="text-muted">
                {{ $destinations->description }}
            </p>

            <hr>

            <p><strong>📍 Lokasi:</strong><br>
                {{ $destinations->location }}
            </p>

            <p><strong>🗓 Hari Buka:</strong> {{ $destinations->working_days }}</p>

            <p><strong>⏰ Jam Buka:</strong> {{ $destinations->working_hours }}</p>

            <p><strong>🎟 Harga Tiket:</strong> 
                Rp {{ number_format($destinations->ticket_price, 0, ',', '.') }}
            </p>
        </div>
    </div>
   
</div>
@endsection