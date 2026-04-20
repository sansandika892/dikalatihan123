@extends('master')

@section('content')
<div class="container py-5">
    
    <div class="card shadow-lg border-0 mb-4">


        <div class="card-body">
            <a href="{{ route('destinations.edit', $destinations->id) }}" class="btn btn-warning rounded-pill px-4 mb-4">
                Edit
            </a>
            <img src="{{ asset('storage/images/' . $destinations->image) ?? 'https://wallpapercave.com/wp/wp2973184.jpg' }}" 
                 class="card-img-top" 
                 style="height: 350px; object-fit: cover;"> 
                
                 <h1>{{$destinations->name}}</h1>
                 <p>{{$destinations->description}}</p>
                    <p><strong>📍 Lokasi:</strong><br>
                        <p>{{ $destinations->location }}</p>
                        <p.{{ $destinations->working_days }}</p>
                        <p>{{ $destinations->working_hours }}</p>           
                        <p>{{ $destinations->ticket_price }}</p>
        </div>
                       
               
            </p>
        </div>
    </div>
   
</div>
@endsection