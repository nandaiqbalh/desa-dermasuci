<?php

use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\BPembuatanKTPController;
use App\Http\Controllers\Backend\HighlightController;
use App\Http\Controllers\Backend\Pelayanan\PerubahanKTPController as PelayananPerubahanKTPController;
use App\Http\Controllers\Backend\ProfilController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\PelayananController;
use App\Http\Controllers\Pelayanan\PerubahanKTPController;
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

    // pembuatan ktp
    Route::resource('admin/admin_pembuatan-ktp', BPembuatanKTPController::class);
    Route::get('/admin_pembuatan-ktp/print/{id}', [BPembuatanKTPController::class, 'print'])->name('admin_pembuatan-ktp.print');

    Route::get('/dalam-review/{id}', [BPembuatanKTPController::class, 'dalamReviewAction'])->name('dalam-review');
    Route::get('/selesai/{id}', [BPembuatanKTPController::class, 'selesaiAction'])->name('selesai');


    // perubahan KTP
    Route::resource('admin/admin_perubahan-ktp', PelayananPerubahanKTPController::class);
    Route::get('/admin_perubahan-ktp/print/{id}', [PelayananPerubahanKTPController::class, 'print'])->name('admin_perubahan-ktp.print');

    Route::get('/dalam-review/{id}', [PelayananPerubahanKTPController::class, 'dalamReviewAction'])->name('dalam-review');
    Route::get('/selesai/{id}', [PelayananPerubahanKTPController::class, 'selesaiAction'])->name('selesai');
});

Route::resource('beranda', BerandaController::class);
Route::resource('pelayanan', PelayananController::class);
Route::resource('berita', FrontendBeritaController::class);

// pelayanan
Route::resource('pembuatan-ktp', PembuatanKTPController::class);
Route::resource('perubahan-ktp', PerubahanKTPController::class);


Route::get('/', [BerandaController::class, 'index']);
