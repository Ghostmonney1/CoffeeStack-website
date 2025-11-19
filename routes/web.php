<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Homepagina
Route::get('/', function () {
    return view('index');
})->name('home');

// Posts routes (voor vragen / forum) - alleen voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    // Formulier om een nieuwe post te maken (optioneel)
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Formulier submitten
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Topic pagina (posts per topic tonen) - kan ook voor gasten
Route::get('/topic/{slug}', [PostController::class, 'topic'])->name('topic');

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

// Auth routes (login, register, password reset etc.)
require __DIR__.'/auth.php';
