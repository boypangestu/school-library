<?php

use App\Http\Controllers\BookauthorController;
use App\Http\Controllers\BookController;
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


Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/', function () {
        return view('menu/home');
    })->name('index');
    Route::resource('books', BookController::class);
    Route::resource('authors', BookauthorController::class);
});





// Route::get('/', function () {
//     return view('layout/home');
// });

// Route::get('/books', [BookController::class, 'index'])->name('book');
// Route::get('/authors', [BookauthorController::class, 'index'])->name('author');


// Route::get('/author', function (Request $request) {
//     // ...
//     return view('home');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
