<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'indexlogin'])->name('login');
Route::get('/login',[AuthController::class,'indexlogin'])->name('login');
Route::post('/Authlogin',[AuthController::class,'login']);
Route::post('/Authregister',[AuthController::class,'register']);
Route::get('/register',[AuthController::class,'indexregister'])->name('register');
Route::get('/dashboard',[dashboard::class,'index'])->name('dashboard')->middleware('AuthMiddleware');