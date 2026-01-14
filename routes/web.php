<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KlijentController;
use App\Http\Controllers\PosiljkaController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\MenadzerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes
    Route::resource('klijenti', KlijentController::class);
    Route::resource('posiljke', PosiljkaController::class);
    Route::resource('kuriri', KurirController::class);
    Route::resource('menadzeri', MenadzerController::class);

    Route::post('/posiljke/kreiraj', [PosiljkaController::class, 'kreiraj'])->name('posiljke.kreiraj');
    Route::post('/posiljke/{id}/preuzmi', [PosiljkaController::class, 'preuzmi'])->name('posiljke.preuzmi');
    Route::post('/posiljke/{id}/dostavi', [PosiljkaController::class, 'dostavi'])->name('posiljke.dostavi');
    Route::post('/posiljke/{id}/dodeli', [PosiljkaController::class, 'dodeli'])->name('posiljke.dodeli');
});

require __DIR__.'/auth.php';
