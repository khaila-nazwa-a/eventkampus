<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\AnggaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store']);
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('event', EventController::class);
    Route::get('/scan', [KehadiranController::class,'index'])->name('scan.index');
    Route::post('/scan', [KehadiranController::class,'scan'])->name('scan.proses');
    Route::resource('anggaran', AnggaranController::class);
});