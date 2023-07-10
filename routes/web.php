<?php

use App\Http\Controllers\Backend\HighlightController;
use App\Http\Controllers\Backend\ProfilController;
use App\Http\Controllers\Frontend\BerandaController;
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
    return view('frontend.frontend_master');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.component.index');
    })->name('dashboard');

    Route::resource('highlights', HighlightController::class);
});

Route::resource('beranda', BerandaController::class);
Route::resource('profil', ProfilController::class);

Route::get('/', [BerandaController::class, 'index']);
