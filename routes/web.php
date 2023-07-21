<?php

use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\BPembuatanKTPController;
use App\Http\Controllers\Backend\HighlightController;
use App\Http\Controllers\Backend\Pelayanan\BEAktaKelahiranController;
use App\Http\Controllers\Backend\Pelayanan\BEAktaKematianController;
use App\Http\Controllers\Backend\Pelayanan\BEKeteranganDomisiliController;
use App\Http\Controllers\Backend\Pelayanan\BEKeteranganUsahaController;
use App\Http\Controllers\Backend\Pelayanan\BEPengantarNikahController;
use App\Http\Controllers\Backend\Pelayanan\BEPermohonanKKController;
use App\Http\Controllers\Backend\Pelayanan\BEPermohonanSKCKController;
use App\Http\Controllers\Backend\Pelayanan\BEPermohonanSKTMController;
use App\Http\Controllers\Backend\Pelayanan\BEPindahDomisiliController;
use App\Http\Controllers\Backend\Pelayanan\PerubahanKTPController as PelayananPerubahanKTPController;
use App\Http\Controllers\Backend\Pengaduan\BEKontakController;
use App\Http\Controllers\Backend\Pengaduan\BEPengaduanController;
use App\Http\Controllers\Backend\Perangkat\BEKadesController;
use App\Http\Controllers\Backend\Perangkat\BEPerangkatController;
use App\Http\Controllers\Backend\Potensi\BEPotensiController;
use App\Http\Controllers\Backend\ProfilController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\PelayananController;
use App\Http\Controllers\Frontend\Penganduan\FEPengaduanController;
use App\Http\Controllers\Frontend\Potensi\FEPotensiController;
use App\Http\Controllers\Pelayanan\AktaKelahiranController;
use App\Http\Controllers\Pelayanan\AktaKematianController;
use App\Http\Controllers\Pelayanan\KeteranganDomisiliController;
use App\Http\Controllers\Pelayanan\KeteranganUsahaController;
use App\Http\Controllers\Pelayanan\PengantarNikahController;
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
    Route::get('/dashboard', [ProfilController::class, 'index'])->name('dashboard');

    Route::resource('admin/highlights', HighlightController::class);
    Route::resource('admin/profil', ProfilController::class);
    Route::resource('admin/admin_berita', BeritaController::class);
    Route::resource('admin/admin_potensi', BEPotensiController::class);

    // pengaduan
    Route::resource('admin/admin_pengaduan', BEPengaduanController::class);
    Route::get('/admin_pengaduan/dalam-review/{id}', [BEPengaduanController::class, 'dalamReviewAction'])->name('admin_pengaduan-dalam-review');
    Route::get('/admin_pengaduan/selesai/{id}', [BEPengaduanController::class, 'selesaiAction'])->name('admin_pengaduan-selesai');

    // kontak
    Route::resource('admin/admin_kontak', BEKontakController::class);

    // perangkat
    Route::resource('admin/admin_kades', BEKadesController::class);
    Route::resource('admin/admin_perangkat', BEPerangkatController::class);

    // pembuatan ktp
    Route::resource('admin/admin_pembuatan-ktp', BPembuatanKTPController::class);
    Route::get('/admin_pembuatan-ktp/print/{id}', [BPembuatanKTPController::class, 'print'])->name('admin_pembuatan-ktp.print');

    Route::get('/pembuatan-ktp/dalam-review/{id}', [BPembuatanKTPController::class, 'dalamReviewAction'])->name('pembuatan-ktp-dalam-review');
    Route::get('/pembuatan-ktp/selesai/{id}', [BPembuatanKTPController::class, 'selesaiAction'])->name('pembuatan-ktp-selesai');


    // perubahan KTP
    Route::resource('admin/admin_perubahan-ktp', PelayananPerubahanKTPController::class);
    Route::get('/admin_perubahan-ktp/print/{id}', [PelayananPerubahanKTPController::class, 'print'])->name('admin_perubahan-ktp.print');

    Route::get('/perubahan-ktp/dalam-review/{id}', [PelayananPerubahanKTPController::class, 'dalamReviewAction'])->name('perubahan-ktp-dalam-review');
    Route::get('/perubahan-ktp/selesai/{id}', [PelayananPerubahanKTPController::class, 'selesaiAction'])->name('perubahan-ktp-selesai');

    // permohonan KK
    Route::resource('admin/admin_permohonan-kk', BEPermohonanKKController::class);
    Route::get('/admin_permohonan-kk/print/{id}', [BEPermohonanKKController::class, 'print'])->name('admin_permohonan-kk.print');

    Route::get('/permohonan-kk-dalam-review/{id}', [BEPermohonanKKController::class, 'dalamReviewAction'])->name('permohonan-kk-dalam-review');
    Route::get('/permohonan-kk-selesai/{id}', [BEPermohonanKKController::class, 'selesaiAction'])->name('permohonan-kk-selesai');

    // Keterangan Domisili
    Route::resource('admin/admin_keterangan-domisili', BEKeteranganDomisiliController::class);
    Route::get('/admin_keterangan-domisili/print/{id}', [BEKeteranganDomisiliController::class, 'print'])->name('admin_keterangan-domisili.print');

    Route::get('/keterangan-domisili-dalam-review/{id}', [BEKeteranganDomisiliController::class, 'dalamReviewAction'])->name('keterangan-domisili-dalam-review');
    Route::get('/keterangan-domisili-selesai/{id}', [BEKeteranganDomisiliController::class, 'selesaiAction'])->name('keterangan-domisili-selesai');

    // Pindah Domisili
    Route::resource('admin/admin_pindah-domisili', BEPindahDomisiliController::class);
    Route::get('/admin_pindah-domisili/print/{id}', [BEPindahDomisiliController::class, 'print'])->name('admin_pindah-domisili.print');

    Route::get('/pindah-domisili-dalam-review/{id}', [BEPindahDomisiliController::class, 'dalamReviewAction'])->name('pindah-domisili-dalam-review');
    Route::get('/pindah-domisili-selesai/{id}', [BEPindahDomisiliController::class, 'selesaiAction'])->name('pindah-domisili-selesai');

    // Permohonan SKCK
    Route::resource('admin/admin_permohonan-skck', BEPermohonanSKCKController::class);
    Route::get('/admin_permohonan-skck/print/{id}', [BEPermohonanSKCKController::class, 'print'])->name('admin_permohonan-skck.print');

    Route::get('/permohonan-skck-dalam-review/{id}', [BEPermohonanSKCKController::class, 'dalamReviewAction'])->name('permohonan-skck-dalam-review');
    Route::get('/permohonan-skck-selesai/{id}', [BEPermohonanSKCKController::class, 'selesaiAction'])->name('permohonan-skck-selesai');

    // Permohonan SKTM
    Route::resource('admin/admin_permohonan-sktm', BEPermohonanSKTMController::class);
    Route::get('/admin_permohonan-sktm/print/{id}', [BEPermohonanSKTMController::class, 'print'])->name('admin_permohonan-sktm.print');

    Route::get('/permohonan-sktm-dalam-review/{id}', [BEPermohonanSKTMController::class, 'dalamReviewAction'])->name('permohonan-sktm-dalam-review');
    Route::get('/permohonan-sktm-selesai/{id}', [BEPermohonanSKTMController::class, 'selesaiAction'])->name('permohonan-sktm-selesai');

    // Permohonan SKTM
    Route::resource('admin/admin_keterangan-usaha', BEKeteranganUsahaController::class);
    Route::get('/admin_keterangan-usaha/print/{id}', [BEKeteranganUsahaController::class, 'print'])->name('admin_keterangan-usaha.print');

    Route::get('/keterangan-usaha-dalam-review/{id}', [BEKeteranganUsahaController::class, 'dalamReviewAction'])->name('keterangan-usaha-dalam-review');
    Route::get('/keterangan-usaha-selesai/{id}', [BEKeteranganUsahaController::class, 'selesaiAction'])->name('keterangan-usaha-selesai');

    // Pengantar Akta Kelahiran
    Route::resource('admin/admin_akta-kelahiran', BEAktaKelahiranController::class);
    Route::get('/admin_akta-kelahiran/print/{id}', [BEAktaKelahiranController::class, 'print'])->name('admin_akta-kelahiran.print');

    Route::get('/akta-kelahiran-dalam-review/{id}', [BEAktaKelahiranController::class, 'dalamReviewAction'])->name('akta-kelahiran-dalam-review');
    Route::get('/akta-kelahiran-selesai/{id}', [BEAktaKelahiranController::class, 'selesaiAction'])->name('akta-kelahiran-selesai');

    // Pengantar Akta Kelahiran
    Route::resource('admin/admin_akta-kematian', BEAktaKematianController::class);
    Route::get('/admin_akta-kematian/print/{id}', [BEAktaKematianController::class, 'print'])->name('admin_akta-kematian.print');

    Route::get('/akta-kematian-dalam-review/{id}', [BEAktaKematianController::class, 'dalamReviewAction'])->name('akta-kematian-dalam-review');
    Route::get('/akta-kematian-selesai/{id}', [BEAktaKematianController::class, 'selesaiAction'])->name('akta-kematian-selesai');

    // Pengantar Akta Kelahiran
    Route::resource('admin/admin_pengantar-nikah', BEPengantarNikahController::class);
    Route::get('/admin_pengantar-nikah/print/{id}', [BEPengantarNikahController::class, 'print'])->name('admin_pengantar-nikah.print');

    Route::get('/pengantar-nikah-dalam-review/{id}', [BEPengantarNikahController::class, 'dalamReviewAction'])->name('pengantar-nikah-dalam-review');
    Route::get('/pengantar-nikah-selesai/{id}', [BEPengantarNikahController::class, 'selesaiAction'])->name('pengantar-nikah-selesai');
});

Route::resource('beranda', BerandaController::class);
Route::resource('pelayanan', PelayananController::class);
Route::resource('berita', FrontendBeritaController::class);

// pengaduan
Route::resource('pengaduan', FEPengaduanController::class);

// potensi
Route::resource('potensi', FEPotensiController::class);


// pelayanan
Route::resource('pembuatan-ktp', PembuatanKTPController::class);
Route::resource('perubahan-ktp', PerubahanKTPController::class);
Route::resource('permohonan-kk', PermohonanKKController::class);
Route::resource('keterangan-domisili', KeteranganDomisiliController::class);
Route::resource('pindah-domisili', PindahDomisiliController::class);
Route::resource('permohonan-skck', PermohonanSKCKController::class);
Route::resource('permohonan-sktm', PermohonanSKTMController::class);
Route::resource('keterangan-usaha', KeteranganUsahaController::class);
Route::resource('akta-kelahiran', AktaKelahiranController::class);
Route::resource('akta-kematian', AktaKematianController::class);
Route::resource('pengantar-nikah', PengantarNikahController::class);

Route::get('/', [BerandaController::class, 'index']);
