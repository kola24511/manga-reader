<?php

use App\Http\Controllers\Entity\Author\AuthorController;
use App\Http\Controllers\Entity\Book\BookController;
use App\Http\Controllers\Entity\User\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::controller(BookController::class)->group(function () {
    Route::get('/catalog', 'show')->name('book.catalog');
    Route::get('/books/{slug}', 'find')->name('book.index');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'show')->name('author.list');
    Route::get('/authors/{id}', 'find')->name('author.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users/{name}', [UserController::class, 'index'])->name('user.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
