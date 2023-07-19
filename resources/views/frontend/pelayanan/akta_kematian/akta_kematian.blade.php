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
                    <h3 class="mb-5">Pengantar Pembuatanan Akta Kematian</h3>
                    <p>Prosedur pembuatan Pengantar Pembuatan Akta Kematian:</p>
                    <ol>
                        <li>Mengisi formulir</li>
                        <li>Menunggu konfirmasi dari kantor desa melalui WhatsApp</li>
                        <li>Datang ke kantor untuk mengambil surat dengan membawa persyaratan yang diperlukan:</li>
                        <ul>
                            <li>KTP ahli waris (pelapor)</li>
                            <li>C-1/Kartu Keluarga (yang meninggal)</li>

                        </ul>
                    </ol>

                    <form action="{{ route('akta-kematian.store') }}" method="POST" class="p-5 bg-light">
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
                            <label for="alamat">Alamat *</label>
                            <input required type="text" class="form-control" id="alamat" name="alamat">
                        </div>

                        <p> <b>Data Termohon</b></p>

                        <div class="form-group">
                            <label for="nama_termohon">Nama Termohon *</label>
                            <input required type="text" class="form-control" id="nama_termohon" name="nama_termohon">
                        </div>

                        <div class="form-group">
                            <label for="bin_termohon">Bin/Binti *</label>
                            <input required type="text" class="form-control" id="bin_termohon" name="bin_termohon">
                        </div>

                        <div class="form-group">
                            <label for="nik_termohon">NIK *</label>
                            <input required type="text" class="form-control" id="nik_termohon" name="nik_termohon">
                        </div>

                        <div class="form-group">
                            <label for="ttl_termohon">Tempat Tanggal Lahir *</label>
                            <input required type="text" class="form-control" id="ttl_termohon" name="ttl_termohon">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin_termohon">Jenis Kelamin *</label>
                            <input required type="text" class="form-control" id="jenis_kelamin_termohon" name="jenis_kelamin_termohon">
                        </div>

                        <div class="form-group">
                            <label for="agama_termohon">Agama *</label>
                            <input required type="text" class="form-control" id="agama_termohon" name="agama_termohon">
                        </div>

                        <p> <b>Data Meninggal</b></p>

                        <div class="form-group">
                            <label for="tanggal_meninggal">Tanggal Meninggal *</label>
                            <input required type="text" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal">
                        </div>

                        <div class="form-group">
                            <label for="jam_meninggal">Jam Meninggal *</label>
                            <input required type="text" class="form-control" id="jam_meninggal" name="jam_meninggal">
                        </div>

                        <div class="form-group">
                            <label for="tempat_meninggal">Tempat Meninggal *</label>
                            <input required type="text" class="form-control" id="tempat_meninggal" name="tempat_meninggal">
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
