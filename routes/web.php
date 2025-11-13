<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Homepagina
Route::get('/', function () {
    return view('index');
})->name('home');

// Topic pagina (voor de blokken op de homepage)
Route::get('/topic/{slug}', function ($slug) {
    return view('topic', ['slug' => $slug]);
})->name('topic');

// Register pagina
Route::get('/register', function () {
    if (auth()->check()) {
        return redirect('/'); // Als al ingelogd, doorsturen naar home
    }
    return view('register');
})->name('register');

// Login pagina
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect('/'); // Als al ingelogd, doorsturen naar home
    }
    return view('login');
})->name('login');

// Profile routes (alleen voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, password reset etc.)
require __DIR__.'/auth.php';
