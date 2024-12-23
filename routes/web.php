<?php

use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::controller(BookController::class)->group(function () {
    Route::get('/catalog', 'catalog')->name('book.catalog');
    Route::get('/books/{id}', 'index')->name('book.index');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'authorsShow')->name('author.list');
    Route::get('/authors/{id}', 'authorMain')->name('author.index');
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
