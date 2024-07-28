<?php

use App\Http\Controllers\KeluhanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'registerPost'])->name('register');
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'loginPost'])->name('login');
  });

  Auth::routes();

Route::middleware('auth', 'user-access:admin')->name('admin.')->group(function () {
    Route::resource('/admin/Pengguna', \App\Http\Controllers\UserController::class);
    Route::resource('/admin/Barang', \App\Http\Controllers\BarangController::class);
    Route::resource('/admin/Customer', \App\Http\Controllers\CustomerController::class);
    Route::resource('/admin/Keluhan', \App\Http\Controllers\KeluhanController::class);
    Route::resource('/admin/Komputer', \App\Http\Controllers\KomputerController::class);
    Route::resource('/admin/Pegawai', \App\Http\Controllers\PegawaiController::class);
    Route::resource('/admin/Supplier', \App\Http\Controllers\SupplierController::class);
    Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::delete('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
  });

  Route::middleware('auth', 'user-access:pegawai')->name('pegawai.')->group(function () {
    Route::resource('/pegawai/Barang', \App\Http\Controllers\BarangController::class);
    Route::resource('/pegawai/Komputer', \App\Http\Controllers\KomputerController::class);
    Route::get('/pegawai/home', [\App\Http\Controllers\HomeController::class, 'pegawaiHome'])->name('pegawai.home');
    Route::delete('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
  });

  Route::middleware('auth', 'user-access:customer')->name('customer.')->group(function () {
    Route::resource('/customer/Keluhan', KeluhanController::class);
    Route::get('/customer/home', [\App\Http\Controllers\HomeController::class, 'customerHome'])->name('customer.home');
    Route::delete('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
  });

// Route::resource('/Customer', \App\Http\Controllers\CustomerController::class);
// Route::resource('/Komputer', \App\Http\Controllers\KomputerController::class);
// Route::resource('/Pegawai', \App\Http\Controllers\PegawaiController::class);
Route::resource('/Pengguna', \App\Http\Controllers\UserController::class);
// Route::resource('/Barang', \App\Http\Controllers\BarangController::class);
// Route::resource('/Supplier', \App\Http\Controllers\SupplierController::class);
// Route::resource('/Keluhan', \App\Http\Controllers\KeluhanController::class);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
