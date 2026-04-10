<?php

use App\Http\Controllers\DestinationController;
use App\Models\destination;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/halo", function () {
    $name = "Rozi";
    $hobis = ["Membaca", "Menulis", "Coding"];
    return view('halo', compact('name', 'hobis'));
});
Route::get("/switch", function () {
    $role = "penulis";
    return view('switch', compact('role'));
});

Route::get("/master", function () {
    return view('pages.home');
});

Route::get("/about", function () {
    return view('pages.about');
});
Route::get("/destinasi", function () {
    $destinasi = [
        "nama" => "Bali",
        "harga" => 5000000,
        "lokasi" => "Denpasar, Bali",
        "durasi" => "4 Hari 3 Malam",
        "transportasi" => "Pesawat",
        "hotel" => "Bintang 4",
        "rating" => 4.8,
        "fasilitas" => ["Hotel", "Sarapan", "Tour Guide", "Transport Lokal"],
    ];
    return view('pages.destinasi', compact('destinasi'));
});


// Route::get("/destinasi", function(){
//     $destinations = destination ::all();

//     return view('pages.indexdestinasi', compact ('destinations'));

// });


// Route::get('/destinasi/{id}', function ($id) {
//     $destinations = Destination::find($id); 
//     return view('pages.destinasi', compact('destinations'));
// });


Route::get(
    uri :"/destinations",
    action: [DestinationController::class,'index']
);

Route::get('/detaildestinasi/{id}',[DestinationController::class, 'show']);

Route ::get ("/destinations/create",[DestinationController::class,'create']);
Route ::post("/destinations",[DestinationController::class,'store']);

Route::delete ('/destination/{id}',[DestinationController::class,'delete']);
Route::get("/destinations/{id}/edit",[DestinationController::class, 'edit']);
Route::put("/destinations/{id}/edit",[DestinationController::class, 'update']);



