<?php 
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Models\destination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Static routes
Route::get('/', [HomeController::class, 'index'])->name('home');


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
    return view('pages.hotels');
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

require __DIR__."/auth.php";

Route::get('/dashboard',function(){
    return redirect()->route('destinations.index'); 
    })->middleware(['auth','verified'])->name('dashboard');



Route::prefix("destinations")->name("destinations.")->group(function(){
    Route::get("/", [DestinationController::class, 'index'])->name('index');
    Route::get("/detaildestinasi/{id}", [DestinationController::class, 'show'])->name("show");
    Route::get("/create", [DestinationController::class, 'create'])->name("create");
    Route::post("/", [DestinationController::class, 'store'])->name("store");
    Route::get("/{id}/edit", [DestinationController::class, 'edit'])->name("edit");
    Route::put("/{id}/update", [DestinationController::class, 'update'])->name("update");
    Route::delete("/{id}/delete", [DestinationController::class, 'delete'])->name("delete");
    Route::delete('/destinations/{id}/delete', [DestinationController::class,'destroy'])->name('destinations.destroy');
 
    
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




use App\Http\Controllers\ReviewController;

Route::get('/review', [ReviewController::class, 'index']);
Route::get('/review/create', [ReviewController::class, 'create']);
Route::post('/review/store', [ReviewController::class, 'store']);



use App\Http\Controllers\HotelsController;

Route::get('/hotels', [HotelsController::class,'index']);
Route::get('/hotels/create', [HotelsController::class,'create']);
Route::post('/hotels/store', [HotelsController::class,'store']);
Route::get('/hotels/{id}/edit', [HotelsController::class,'edit']);
Route::put('/hotels/{id}/update', [HotelsController::class,'update']);
Route::delete('/hotels/{id}/delete', [HotelsController::class,'delete']);