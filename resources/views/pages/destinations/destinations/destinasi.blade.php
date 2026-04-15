@extends('master')

@section('content')
<div class="container py-5">
   
    <div class="card shadow-lg border-0 mb-4">
        
       
        {{-- Konten --}}
        <div class="card-body">
            <h2 class="fw-bold mb-3">{{ $destinations->name }}</h2>

            <p class="text-mutedestinations">
                {{ $destinations->description }}
            </p>

            <hr>

            <p><strong>📍 Lokasi:</strong><br>
                {{ $destinations->lacation }}
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