<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrickController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('/home', 'welcome')->name('home');
Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');

Route::get('/tricks', [TrickController::class, 'index'])->name('tricks.index');
Route::middleware('auth')->group(function () {
    Route::post('/tricks', [TrickController::class, 'store'])->name('tricks.store');
    Route::get('tricks/create', [TrickController::class, 'create'])->name('tricks.create');
    Route::get('tricks/{trick}/edit', [TrickController::class, 'edit'])->name('tricks.edit');
    Route::put('tricks/{trick}', [TrickController::class, 'update'])->name('tricks.update');
    Route::delete('tricks/{trick}', [TrickController::class, 'destroy'])->name('tricks.destroy');
});
Route::get('/tricks/{trick}', [TrickController::class, 'show'])->name('tricks.show');

//admin
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
