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
                    <h3 class="mb-5">Pengantar Surat Keterangan Usaha</h3>
                    <p>Prosedur pembuatan Pengantar Surat Keterangan Usaha:</p>
                    <ol>
                        <li>Mengisi formulir</li>
                        <li>Menunggu konfirmasi dari kantor desa melalui WhatsApp</li>
                        <li>Datang ke kantor untuk mengambil surat dengan membawa persyaratan yang diperlukan:</li>
                        <ul>
                            <li>Fotokopi Kartu Tanda Penduduk (KTP) Pemohon</li>
                            <li>Fotokopi Akta Pendirian Usaha</li>
                        </ul>
                    </ol>

                    <form action="{{ route('keterangan-usaha.store') }}" method="POST" class="p-5 bg-light">
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

                        <p> <b>Keterangan Usaha</b></p>

                        <div class="form-group">
                            <label for="nama_usaha">Nama Usaha *</label>
                            <input required type="text" class="form-control" id="nama_usaha" name="nama_usaha">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_usaha">Tanggal Pendirian Usaha *</label>
                            <input required type="text" class="form-control" id="tanggal_usaha" name="tanggal_usaha">
                        </div>

                        <div class="form-group">
                            <label for="alamat_usaha">Alamat Usaha *</label>
                            <input required type="text" class="form-control" id="alamat_usaha" name="alamat_usaha">
                        </div>

                        <div class="form-group">
                            <label for="jenis_usaha">Jenis Usaha *</label>
                            <input required type="text" class="form-control" id="jenis_usaha" name="jenis_usaha">
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
