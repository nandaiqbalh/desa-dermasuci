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
                    <h3 class="mb-5">Surat Pengantar Nikah</h3>
                    <p>Prosedur pembuatan Surat Pengantar Nikah :</p>
                    <ol>
                        <li>Mengisi formulir</li>
                        <li>Menunggu konfirmasi dari kantor desa melalui WhatsApp</li>
                        <li>Datang ke kantor untuk mengambil surat dengan membawa persyaratan yang diperlukan:</li>
                        <ul>

                        </ul>
                    </ol>

                    <form action="{{ route('pengantar-nikah.store') }}" method="POST" class="p-5 bg-light">
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
                            <label for="status_perkawinan">Status Perkawinan *</label>
                            <input required type="text" class="form-control" id="status_perkawinan" name="status_perkawinan">
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

                        <p> <b>Data Ayah Pemohon</b></p>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah*</label>
                            <input required type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                        </div>

                        <div class="form-group">
                            <label for="nik_ayah">NIK Ayah*</label>
                            <input required type="text" class="form-control" id="nik_ayah" name="nik_ayah">
                        </div>

                        <div class="form-group">
                            <label for="tempat_tanggal_lahir_ayah">Tempat / Tanggal Lahir Ayah*</label>
                            <input required type="text" class="form-control" id="tempat_tanggal_lahir_ayah" name="tempat_tanggal_lahir_ayah">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah*</label>
                            <input required type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah">
                        </div>

                        <div class="form-group">
                            <label for="alamat_ayah">Alamat Ayah*</label>
                            <input required type="text" class="form-control" id="alamat_ayah" name="alamat_ayah">
                        </div>

                        <div class="form-group">
                            <label for="agama_ayah">Agama Ayah*</label>
                            <input required type="text" class="form-control" id="agama_ayah" name="agama_ayah">
                        </div>

                        <p> <b>Data Ibu Pemohon</b></p>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu*</label>
                            <input required type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                        </div>

                        <div class="form-group">
                            <label for="nik_ibu">NIK Ibu*</label>
                            <input required type="text" class="form-control" id="nik_ibu" name="nik_ibu">
                        </div>

                        <div class="form-group">
                            <label for="tempat_tanggal_lahir_ibu">Tempat / Tanggal Lahir Ibu*</label>
                            <input required type="text" class="form-control" id="tempat_tanggal_lahir_ibu" name="tempat_tanggal_lahir_ibu">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu*</label>
                            <input required type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu">
                        </div>

                        <div class="form-group">
                            <label for="alamat_ibu">Alamat Ibu*</label>
                            <input required type="text" class="form-control" id="alamat_ibu" name="alamat_ibu">
                        </div>

                        <div class="form-group">
                            <label for="agama_ibu">Agama Ibu*</label>
                            <input required type="text" class="form-control" id="agama_ibu" name="agama_ibu">
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
