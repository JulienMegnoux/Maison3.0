<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
})->name('accueil');

Route::get('/inscription', [AuthController::class, 'showRegister'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'register'])->name('register.submit');

Route::get('/connexion', [AuthController::class, 'showLogin'])->name('connexion');
Route::post('/connexion', [AuthController::class, 'login'])->name('login.submit');

Route::get('/verification-code', [AuthController::class, 'showCodeForm'])->name('code.form');
Route::post('/verification-code', [AuthController::class, 'verifyCode'])->name('code.verifier');
