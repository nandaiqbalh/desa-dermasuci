@extends('frontend.frontend_master')

@section('main_frontend')
<section class="ftco-section">
    <div class="container">
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        <div class="row">
            <div class="col-lg-12 ftco-animate">
                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Pengantar Pembuatanan Akta Kelahiran</h3>
                    <p>Prosedur pembuatan Pengantar Pembuatan Akta Kelahiran:</p>
                    <ol>
                        <li>Mengisi formulir</li>
                        <li>Menunggu konfirmasi dari kantor desa melalui WhatsApp</li>
                        <li>Datang ke kantor untuk mengambil surat dengan membawa persyaratan yang diperlukan:</li>
                        <ul>
                            <li>Fotokopi Surat Nikah dilegalisir KUA</li>
                            <li>Fotokopi KTP kedua orangtua</li>
                            <li>Fotokopi C-1/Kartu Keluarga</li>
                            <li>Nama bayi</li>
                            <li>Fotokopi KTP 2 orang saksi penduduk</li>
                            <li>Surat keterangan kelahiran dari bidan/rumah sakit</li>
                            <li>Pembuatan akta kelahiran sesuai dengan KTP asal orang tua</li>
                        </ul>
                    </ol>

                    <form action="{{ route('akta-kelahiran.store') }}" method="POST" class="p-5 bg-light">
                        @csrf
                        <p> <b>Data Pemohon</b></p>
                        <div class="form-group">
                            <label for="nama">Nama *</label>
                            <input required type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP *</label>
                            <input required type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>

                        <div class="form-group">
                            <label for="nik">NIK *</label>
                            <input required type="text" class="form-control" id="nik" name="nik">
                        </div>

                        <div class="form-group">
                            <label for="tempat_tanggal_lahir">Tempat / Tanggal Lahir *</label>
                            <input required type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan *</label>
                            <input required type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat *</label>
                            <input required type="text" class="form-control" id="alamat" name="alamat">
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama *</label>
                            <input required type="text" class="form-control" id="agama" name="agama">
                        </div>

                        <p> <b>Data Anak</b></p>

                        <div class="form-group">
                            <label for="nama_anak">Nama Anak *</label>
                            <input required type="text" class="form-control" id="nama_anak" name="nama_anak">
                        </div>

                        <div class="form-group">
                            <label for="ttl_anak">Tempat Tanggal Lahir Anak*</label>
                            <input required type="text" class="form-control" id="ttl_anak" name="ttl_anak">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin_anak">Jenis Kelamin Anak*</label>
                            <input required type="text" class="form-control" id="jenis_kelamin_anak" name="jenis_kelamin_anak">
                        </div>

                        <div class="form-group">
                            <label for="keterangan_lain">Keterangan Lain *</label>
                            <input required type="text" class="form-control" id="keterangan_lain" name="keterangan_lain">
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Kirim" class="btn py-3 px-4 btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->
@endsection
