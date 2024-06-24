<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    /* Route::resource('blog', BlogController::class); */

    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
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
