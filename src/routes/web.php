<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\RentalController;
use App\Http\Controllers\User\ReviewController;

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

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/search', [BookController::class, 'search'])->name('book.search');
    Route::get('/show/{bookId}', [BookController::class, 'show'])->name('book.show');

    Route::get('/mypage', [RentalController::class, 'mypage'])->name('rental.mypage');
    Route::post('/rental/checkout', [RentalController::class, 'checkout'])->name('rental.checkout');
    Route::post('/rental/return', [RentalController::class, 'return'])->name('rental.return');

    Route::get('/review/create/{bookId}', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
});

require __DIR__ . '/auth.php';
