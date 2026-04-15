<?php

use App\Http\Controllers\AttractionController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Models\destination;
use Illuminate\Support\Facades\Route;

// Static routes
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

// Destinations
Route::prefix("destinations")->name("destinations.")->group(function(){
    Route::get("/", [DestinationController::class, 'index'])->name('index');
    Route::get("/detaildestinasi/{id}", [DestinationController::class, 'show'])->name("show");
    Route::get("/create", [DestinationController::class, 'create'])->name("create");
    Route::post("/", [DestinationController::class, 'store'])->name("store");
    Route::get("/{id}/edit", [DestinationController::class, 'edit'])->name("edit");
    Route::put("/{id}/update", [DestinationController::class, 'update'])->name("update");
    Route::delete("/{id}/delete", [DestinationController::class, 'delete'])->name("delete");
});

// Users
Route::prefix("users")->name("user.")->group(function(){
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/detailuser/{id}", [UserController::class, 'show'])->name("show");
    Route::get("/create", [UserController::class, 'create'])->name("create");
    Route::post("/", [UserController::class, 'store'])->name("store");
    Route::get("/{id}/edit", [UserController::class, 'edit'])->name("edit");
    Route::put("/{id}/update", [UserController::class, 'update'])->name("update");
    Route::delete("/{id}", [UserController::class, 'destroy'])->name("destroy");
    Route::delete("/{id}/delete", [UserController::class, 'delete'])->name("delete");
});

// Attractions
Route::prefix("attractions")->name("attractions.")->group(function(){
    Route::get("/", [AttractionController::class, 'index'])->name('index');
    Route::get("/create", [AttractionController::class, 'create'])->name('create');
    Route::post("/", [AttractionController::class, 'store'])->name('store');
    Route::get("/{id}", [AttractionController::class, 'show'])->name('show');
    Route::get("/{id}/edit", [AttractionController::class, 'edit'])->name('edit');
    Route::put("/{id}", [AttractionController::class, 'update'])->name('update');
    Route::delete("/{id}", [AttractionController::class, 'destroy'])->name('destroy');
});
