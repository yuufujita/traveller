<?php

use App\Http\Controllers\ProfileController;
// 追加
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ScrapeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
    // 追加
    Route::get('scrapes', [ScrapeController::class, 'index'])->name('scrapes.index');
    Route::post('scrapes', [ScrapeController::class, 'scrape'])->name('scrapes.scrape');
    Route::resource('tweets', TweetController::class);
});

require __DIR__.'/auth.php';
