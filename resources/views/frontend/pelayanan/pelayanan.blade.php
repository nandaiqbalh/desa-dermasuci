@extends('frontend.frontend_master')

@section('main_frontend')
<section class="ftco-section" id="services-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Selamat Datang,</span>
                <h2 class="mb-4">Pelayanan Digital Desa Dermasuci</h2>
                <p>Silahkan pilih layanan yang anda butuhkan</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('pembuatan-ktp.index') }}" class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span class="flaticon-app-development"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Pembuatan KTP</h3>
                        <p>Buat surat pengantar untuk kebutuhan pembuatan KTP.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('perubahan-ktp.index') }}" class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span class="flaticon-app-development"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Perubahan KTP</h3>
                        <p>Buat surat pengantar untuk kebutuhan perubahan KTP.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('permohonan-kk.index') }}" class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span class="flaticon-app-development"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Permohonan KK</h3>
                        <p>Buat surat pengantar pembuatan/perubahan Kartu Keluarga.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-zoom"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Keterangan Domisili</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-branding"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Pindah Masuk</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-computer"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Pindah Keluar</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-vector"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Pembuatan SKCK</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-vector"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Pembuatan SKTM</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-zoom"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Akta Kelahiran</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-zoom"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Akta Kematian</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-zoom"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Surat Usaha</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-zoom"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Pengantar KK</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center"><span
                            class="flaticon-zoom"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Perubahan KK</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
