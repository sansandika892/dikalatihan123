<?php

use App\Http\Controllers\AttractionController;
use App\Http\Controllers\DestinationController;
use App\Models\destination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
















Route::prefix("destinations")->name("destinations.")->group(function(){
Route::get(
    uri :"/",
    action: [DestinationController::class,'index']
)->name('index');

Route::get ('/detaildestinasi/{id}',[DestinationController::class, 'show'])->name("show");
Route::get ("/create",[DestinationController::class,'create'])->name("create");
Route::post("/",[DestinationController::class,'store'])->name("store");
Route::delete('/{id}/delete',[DestinationController::class,'delete'])->name("delete");
Route::get("/{id}/edit",[DestinationController::class, 'edit'])->name("edit");
Route::put("/{id}/update",[DestinationController::class, 'update'])->name("update");

});






Route::prefix("users")->name("user.")->group(function(){
Route::get(
uri :"/",
   action: [UserController::class,'index']
);
Route::get('/user', [UserController::class, 'index'])->name("index");     // list
Route::get ('/detailuser/{id}',[UserController::class, 'show'])->name("show");// menampilkan
Route::get('/user/create', [UserController::class, 'create'])->name("create"); // form tambah
Route::post('/user', [UserController::class, 'store'])->name("store");    // simpan
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name("edit"); // form edit
Route::put('/user/{id}/update', [UserController::class, 'update'])->name("update"); // update
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name("destroy"); // hapus
Route::delete('/{id}/delete',[userController::class,'delete'])->name("delete");
});



use App\Http\Controllers\CategoryController; 

Route::prefix("attractions")->name("attractions.")->group(function(){
Route::get('/attractions', [AttractionController::class, 'index']);
Route::get('/attractions/create', [AttractionController::class, 'create']);
Route::post('/attractions/store', [AttractionController::class, 'store']);
Route::get('/attractions/{id}/edit', [AttractionController::class, 'edit']);
Route::put('/attractions/{id}/update', [AttractionController::class, 'update']);
Route::delete('/attractions/{id}/delete', [AttractionController::class, 'delete']);
});