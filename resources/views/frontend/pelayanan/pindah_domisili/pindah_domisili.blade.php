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
                    <h3 class="mb-5">Surat Pindah Domisili</h3>
                    <p>Prosedur pembuatan Surat Pindah Domisili:</p>
                    <ol>
                        <li>Mengisi formulir</li>
                        <li>Menunggu konfirmasi dari kantor desa melalui WhatsApp</li>
                        <li>Datang ke kantor untuk mengambil surat dengan membawa persyaratan yang diperlukan   </li>
                        <ul>
                            <li>KTP asli</li>
                            <li>C-1/ Kartu Keluarga yang asli</li>
                        </ul>
                    </ol>

                    <form action="{{ route('pindah-domisili.store') }}" method="POST" class="p-5 bg-light">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama *</label>
                            <input required type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="no_kk">Nomor Kartu Keluarga *</label>
                            <input required type="text" class="form-control" id="no_kk" name="no_kk" required>
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
                            <label for="alamat_asal">Alamat Asal*</label>
                            <input required type="text" class="form-control" id="alamat_asal" name="alamat_asal">
                        </div>

                        <div class="form-group">
                            <label for="alamat_tujuan">Alamat Tujuan*</label>
                            <input required type="text" class="form-control" id="alamat_tujuan" name="alamat_tujuan">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan (Masuk/Keluar)*</label>
                            <input required type="text" class="form-control" id="keterangan" name="keterangan">
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
