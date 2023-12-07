<?php

use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\ProfileController;
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

Route::get('/hallo/{name?}', function($name) {
    echo 'Hallo ' . ($name ?? 'Welt');
});

Route::get('/greeting/{name?}', [HelloWorldController::class, 'greeting']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->name('profile.')
    ->prefix('profile')
    ->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])
            ->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])
            ->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])
            ->name('destroy');
    });

require __DIR__.'/auth.php';
