<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get("/", [\App\Http\Controllers\ProfileController::class, 'index'])->name("profile");

    Route::group(['prefix' => 'authors'], function () {
        Route::get("/", [\App\Http\Controllers\AuthorController::class, 'index'])->name("authors");
        Route::get("/{id}", [\App\Http\Controllers\AuthorController::class, 'single'])->name("authors.single");
        Route::get("/{id}/delete", [\App\Http\Controllers\AuthorController::class, 'deleteAuthor'])->name("authors.delete");
        Route::get("/book/{id}/delete", [\App\Http\Controllers\AuthorController::class, 'deleteBook'])->name("book.delete");
    });

    Route::get("/add-book", [\App\Http\Controllers\BookController::class, 'addBook'])->name("book.add");
    Route::post("/store-book", [\App\Http\Controllers\BookController::class, 'saveBook'])->name("book.store");
});

Route::get("/login", [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest')->name("login");
Route::post("/process-login", [\App\Http\Controllers\AuthController::class, 'processLogin'])->name("login.process");

