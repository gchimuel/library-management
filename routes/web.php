<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect('login');
});

Route::get('/library', [LibraryController::class,'index'])->middleware(['auth', 'verified'])->name('library');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/library', [LibraryController::class, 'insert'])->name('library.insert');
    Route::patch('/library', [LibraryController::class, 'update'])->name('library.update');
    Route::delete('/library', [LibraryController::class, 'destroy'])->name('library.destroy');
});

require __DIR__.'/auth.php';
