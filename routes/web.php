<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Dashboard\Pages\Area;
use App\Http\Livewire\Dashboard\Pages\Toponym;
use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => '/dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })
        ->name('dashboard');

    Route::get('/area', Area::class)->name('dashboard.area');
    Route::get('/toponym', Toponym::class)->name('dashboard.toponym');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
