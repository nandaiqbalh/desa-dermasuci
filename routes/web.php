<?php

use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\BPembuatanKTPController;
use App\Http\Controllers\Backend\HighlightController;
use App\Http\Controllers\Backend\Pelayanan\BEKeteranganDomisiliController;
use App\Http\Controllers\Backend\Pelayanan\BEPermohonanKKController;
use App\Http\Controllers\Backend\Pelayanan\BEPermohonanSKCKController;
use App\Http\Controllers\Backend\Pelayanan\BEPermohonanSKTMController;
use App\Http\Controllers\Backend\Pelayanan\BEPindahDomisiliController;
use App\Http\Controllers\Backend\Pelayanan\PerubahanKTPController as PelayananPerubahanKTPController;
use App\Http\Controllers\Backend\ProfilController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\PelayananController;
use App\Http\Controllers\Pelayanan\KeteranganDomisiliController;
use App\Http\Controllers\Pelayanan\PermohonanKKController;
use App\Http\Controllers\Pelayanan\PermohonanSKCKController;
use App\Http\Controllers\Pelayanan\PermohonanSKTMController;
use App\Http\Controllers\Pelayanan\PerubahanKTPController;
use App\Http\Controllers\Pelayanan\PindahDomisiliController;
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

    // permohonan KK
    Route::resource('admin/admin_permohonan-kk', BEPermohonanKKController::class);
    Route::get('/admin_permohonan-kk/print/{id}', [BEPermohonanKKController::class, 'print'])->name('admin_permohonan-kk.print');

    Route::get('/dalam-review/{id}', [BEPermohonanKKController::class, 'dalamReviewAction'])->name('dalam-review');
    Route::get('/selesai/{id}', [BEPermohonanKKController::class, 'selesaiAction'])->name('selesai');

    // Keterangan Domisili
    Route::resource('admin/admin_keterangan-domisili', BEKeteranganDomisiliController::class);
    Route::get('/admin_keterangan-domisili/print/{id}', [BEKeteranganDomisiliController::class, 'print'])->name('admin_keterangan-domisili.print');

    Route::get('/dalam-review/{id}', [BEKeteranganDomisiliController::class, 'dalamReviewAction'])->name('dalam-review');
    Route::get('/selesai/{id}', [BEKeteranganDomisiliController::class, 'selesaiAction'])->name('selesai');

    // Pindah Domisili
    Route::resource('admin/admin_pindah-domisili', BEPindahDomisiliController::class);
    Route::get('/admin_pindah-domisili/print/{id}', [BEPindahDomisiliController::class, 'print'])->name('admin_pindah-domisili.print');

    Route::get('/dalam-review/{id}', [BEPindahDomisiliController::class, 'dalamReviewAction'])->name('dalam-review');
    Route::get('/selesai/{id}', [BEPindahDomisiliController::class, 'selesaiAction'])->name('selesai');

    // Permohonan SKCK
    Route::resource('admin/admin_permohonan-skck', BEPermohonanSKCKController::class);
    Route::get('/admin_permohonan-skck/print/{id}', [BEPermohonanSKCKController::class, 'print'])->name('admin_permohonan-skck.print');

    Route::get('/dalam-review/{id}', [BEPermohonanSKCKController::class, 'dalamReviewAction'])->name('dalam-review');
    Route::get('/selesai/{id}', [BEPermohonanSKCKController::class, 'selesaiAction'])->name('selesai');

    // Permohonan SKTM
    Route::resource('admin/admin_permohonan-sktm', BEPermohonanSKTMController::class);
    Route::get('/admin_permohonan-sktm/print/{id}', [BEPermohonanSKTMController::class, 'print'])->name('admin_permohonan-sktm.print');

    Route::get('/dalam-review/{id}', [BEPermohonanSKTMController::class, 'dalamReviewAction'])->name('dalam-review');
    Route::get('/selesai/{id}', [BEPermohonanSKTMController::class, 'selesaiAction'])->name('selesai');
});

Route::resource('beranda', BerandaController::class);
Route::resource('pelayanan', PelayananController::class);
Route::resource('berita', FrontendBeritaController::class);

// pelayanan
Route::resource('pembuatan-ktp', PembuatanKTPController::class);
Route::resource('perubahan-ktp', PerubahanKTPController::class);
Route::resource('permohonan-kk', PermohonanKKController::class);
Route::resource('keterangan-domisili', KeteranganDomisiliController::class);
Route::resource('pindah-domisili', PindahDomisiliController::class);
Route::resource('permohonan-skck', PermohonanSKCKController::class);
Route::resource('permohonan-sktm', PermohonanSKTMController::class);






Route::get('/', [BerandaController::class, 'index']);
