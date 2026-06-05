<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('user.Home');
});

Route::get('/event', function () {

    $events = Event::all();

    return view('event.event', compact('events'));
});

//use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

//Route::get(
  //  '/event/{id}/tickets',
    //[UserController::class, 'tickets']
//);

Route::get('/produk', function () {
    return view('produk');
});

//use App\Http\Controllers\LoginController;

Route::get('/login',
    [LoginController::class, 'index']);

Route::post('/login',
    [LoginController::class, 'authenticate']);

Route::post('/logout',
    [LoginController::class, 'logout']);

Route::get('/login', [AuthController::class,'showLogin']);
Route::POST('/login', [AuthController::class,'login']);
Route::POST('/logout', [AuthController::class,'logout']);

//use App\Http\Controllers\AdminController;

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/home', [UserController::class, 'home']);
Route::get('/event/{id}', [UserController::class, 'detail']);

Route::get(
    '/event/{id}/tribun',
    [UserController::class, 'halamanTribun']
);

Route::get(
    '/event/{id}/tribun/{zona}',
    [UserController::class, 'pilihBlok']
);

Route::get(
    '/event/{id}/tribun/{zona}/blok/',
    [UserController::class, 'pilihBlok']
);

Route::get(
    '/event/{id}/tribun/{zona}/blok/{blok}',
    [UserController::class, 'pilihKursi']
);

Route::get(
    '/checkout/{event}/{zona}/{blok}',
    [UserController::class, 'Checkout']
);

Route::post(
    '/event/{id}/checkout/confirm',
    [UserController::class, 'confirmCheckout']
);
// 1. Tombol 'Beli Tiket' mengarah ke halaman Pilih Kategori
//Route::get('/event/{id}/kategori', [UserController::class, 'pilihKategori']);

//Route::get('/event/{id}/kategori/{kategori}/tribun',[UserController::class, 'pilihTribun']);

// 2. Setelah pilih Kategori, masuk ke halaman Pilih Tribun
//Route::get('/event/{id}/kategori/{kategori}/seats', [UserController::class, 'pilihKursi']);

// 3. Setelah pilih Tribun, masuk ke halaman Pilih Kursi (Seat Map)
//Route::get('/event/{id}/tribun/{id_tiket}/seats', [UserController::class, 'pilihKursi']);

//Route::get('/event/{id}/tribun/{id_ticket}/seats', [UserController::class, 'pilihKursi']);

//Route::get('/event/{id}/tickets', [UserController::class, 'tickets']);
//Route::get('/event/{id}/tribun',[UserController::class, 'pilihTribun']);
//Route::get('/event/{id}/seats/{ticket_id}', [App\Http\Controllers\UserController::class, 'pilihKursiSpesifik']);


Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

//use App\Http\Controllers\EventController;

Route::get('/admin/event/create',
    [EventController::class, 'create']);

Route::post('/admin/event/store',
    [EventController::class,'store']);

Route::get('/admin/event/edit/{id}',
    [EventController::class,'edit']);

Route::post('/admin/event/update/{id}',
    [EventController::class,'update']);

Route::get('/admin/event/delete/{id}',
    [EventController::class, 'destroy']);

Route::get('/pembayaran', function () {

    return view('pembayaran');

})->middleware('auth');
