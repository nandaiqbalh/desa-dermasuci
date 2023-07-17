<?php

use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\HighlightController;
use App\Http\Controllers\Backend\ProfilController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\PelayananController;
use App\Http\Controllers\PembuatanKTPController;
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

    Route::resource('admin/highlights', HighlightController::class);
    Route::resource('admin/profil', ProfilController::class);
    Route::resource('admin/admin_berita', BeritaController::class);
});

Route::resource('beranda', BerandaController::class);
Route::resource('pelayanan', PelayananController::class);
Route::resource('berita', FrontendBeritaController::class);

// pelayanan
Route::resource('pembuatan-ktp', PembuatanKTPController::class);

Route::get('/', [BerandaController::class, 'index']);
