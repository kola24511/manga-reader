<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Entity\Author\AuthorController;
use App\Http\Controllers\Entity\Book\BookController;
use App\Http\Controllers\Entity\User\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

/* КНИГИ */
Route::controller(BookController::class)->group(function () {
    Route::get('/catalog', 'show')->name('book.catalog');
    Route::get('/books/{slug}', 'find')->name('book.index');
});

Route::controller(BookmarkController::class)->group(function () {
    Route::post('/books/{id}/bookmark', 'update')->name('bookmarks.update');
});

/* АВТОРЫ */
Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'show')->name('author.list');
    Route::get('/authors/{id}', 'find')->name('author.index');
});

/* ПОЛЬЗОВАТЕЛИ */
Route::middleware('auth')->group(function () {
    Route::get('/users/{name}', [UserController::class, 'index'])->name('user.index');
});

/* ЛИЧНЫЙ КАБИНЕТ */
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function ()
{
    Route::get('/', function () { return view('dashboard'); })->name('index');
    /* ЗАКЛАДКИ */
    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
    Route::get('/bookmarks', [ProfileController::class, 'getBookmark'])->name('bookmarks');
    Route::get('/subscription', [ProfileController::class, 'getSubscription'])->name('subscription');
    Route::get('/achievements', [ProfileController::class, 'getAchievements'])->name('achievements');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users/{name}', [UserController::class, 'index'])->name('user.index');
});

//ЗАКЛАДКИ
Route::get('/bookmarks', [ProfileController::class, 'getBookmark'])
    ->name('profile.bookmarks');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
