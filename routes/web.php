<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;

Route::get('/', function () {
    return view('index');
})->name('accueil');

Route::get('/inscription', [AuthController::class, 'showRegister'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'register'])->name('register.submit');

Route::get('/connexion', [AuthController::class, 'showLogin'])->name('connexion');
Route::post('/connexion', [AuthController::class, 'login'])->name('login.submit');

Route::get('/verification-code', [AuthController::class, 'showCodeForm'])->name('code.form');
Route::post('/verification-code', [AuthController::class, 'verifyCode'])->name('code.verifier');

Route::get('/menu', [AuthController::class, 'showMenu'])->name('menu')->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        if (auth()->check() && auth()->user()->email === 'julien.megnoux@me.com') {
            $users = App\Models\User::all();
            $logs = \App\Models\UserLog::latest()->take(50)->get();
            $categories = \App\Models\Category::all();
            $items = \App\Models\Item::with('category')->get();
            return view('admin', compact('users', 'logs', 'categories', 'items'));
        }
        abort(403, 'Accès refusé');
    })->name('dashboard');

    Route::resource('users', UserAdminController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show', 'edit', 'update']);
    Route::resource('items', ItemController::class)->except(['show', 'edit', 'update']);
});
