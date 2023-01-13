<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/search', [BookController::class, 'search'])->name('book.search');
    Route::get('/show/{bookId}', [BookController::class, 'show'])->name('book.show');
    Route::post('/checkout', [BookController::class, 'checkout'])->name('book.checkout');
    Route::get('/mypage', [BookController::class, 'mypage'])->name('book.mypage');
});

require __DIR__ . '/auth.php';
