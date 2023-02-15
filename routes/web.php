<?php

use App\Http\Livewire\Toponym\Create as ToponymCreate;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })
        ->name('dashboard');

    Route::group(['prefix' => 'toponym'], function () {
        Route::get('/', ToponymCreate::class)->name('toponym.create');
    });
})
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile',      [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
