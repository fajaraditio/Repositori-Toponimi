<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Dashboard\Pages\Area;
use App\Http\Livewire\Dashboard\Pages\CreateToponym;
use App\Http\Livewire\Dashboard\Pages\EditToponym;
use App\Http\Livewire\Dashboard\Pages\Toponym;
use App\Http\Livewire\Dashboard\Pages\ViewToponym;
use App\Http\Livewire\Guest\Pages\Contact;
use App\Http\Livewire\Guest\Pages\District;
use App\Http\Livewire\Guest\Pages\Province;
use App\Http\Livewire\Guest\Pages\Regency;
use App\Http\Livewire\Guest\Pages\Village;
use App\Http\Livewire\Guest\Pages\Welcome;
use App\Http\Livewire\Guest\Pages\Toponym as GuestToponym;
use App\Http\Livewire\Guest\Pages\ViewToponym as GuestViewToponym;
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

Route::get('/',                             Welcome::class)->name('welcome');
Route::get('/area/province',                Province::class)->name('area.province');
Route::get('/area/regency/{province}',      Regency::class)->name('area.regency');
Route::get('/area/district/{regency}',      District::class)->name('area.district');
Route::get('/area/village/{district}',      Village::class)->name('area.village');
Route::get('/toponym',                      GuestToponym::class)->name('toponym');
Route::get('/toponym/{toponym}',            GuestViewToponym::class)->name('toponym.view');
Route::get('/contact',                      Contact::class)->name('contact');

Route::group(['prefix' => '/dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })
        ->name('dashboard');

    Route::get('/area',     Area::class)->name('dashboard.area');
    Route::get('/toponym',  Toponym::class)->name('dashboard.toponym');

    Route::get('/toponym/create',           CreateToponym::class)->name('dashboard.toponym.create');
    Route::get('/toponym/edit/{toponym}',   EditToponym::class)->name('dashboard.toponym.edit');
    Route::get('/toponym/view/{toponym}',   ViewToponym::class)->name('dashboard.toponym.view');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile',      [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
