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
Route::get('/event/{id}/tickets', [UserController::class, 'tickets']);


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
