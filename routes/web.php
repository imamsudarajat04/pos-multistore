<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/todoLogin', [LoginController::class, 'todoLogin'])->name('todoLogin');