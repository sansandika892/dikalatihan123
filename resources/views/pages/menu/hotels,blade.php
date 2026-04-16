@extends('master')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Hotel</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/hotel1.jpg') }}" class="card-img-top" alt="Hotel 1">
                <div class="card-body">
                    <h5 class="card-title
                    

                //hero section
                    ">Hotel Santika Premiere Malang</h5>
                    <p class="card-text">Hotel bintang 4 dengan fasilitas lengkap dan lokasi strategis di pusat kota Malang.</p>
                </div>
            </div>  


        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/hotel2.jpg') }}" class="card-img-top" alt="Hotel 2">
                <div class="card-body">
                    <h5 class="card-title">Hotel Tugu Malang</h5>
                    <p class="card-text">Hotel butik dengan desain unik yang menggabungkan elemen budaya Jawa dan kolonial Belanda, terletak di pusat kota Malang.</p>
                </div>


                <div class="card h-100">
                    <img src="{{ asset('images/hotel3.jpg') }}" class="card-img-top" alt="Hotel 3">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Ijen Suites Resort & Convention</h5>
                        <p class="card-text">Hotel bintang 4 dengan fasilitas lengkap, termasuk kolam renang, spa, dan pusat kebugaran, terletak di kawasan wisata Batu, Malang.</p>
                    </div>      