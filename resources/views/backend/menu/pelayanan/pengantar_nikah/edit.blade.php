@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Surat</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_pengantar-nikah.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <p><b>Data Pemohon</b></p>

                <div class="form-group">
                    <label for="no_surat">No Surat</label>
                    <input type="text" name="no_surat" id="no_surat" class="form-control" value="{{ $data->no_surat }}">
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $data->no_hp }}" required>
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" value="{{ $data->nik }}" required>
                </div>

                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control" value="{{ $data->status_perkawinan }}" required>
                </div>

                <div class="form-group">
                    <label for="tempat_tanggal_lahir">Tempat/Tanggal Lahir</label>
                    <input type="text" name="tempat_tanggal_lahir" id="tempat_tanggal_lahir" class="form-control" value="{{ $data->tempat_tanggal_lahir }}" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ $data->pekerjaan }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $data->alamat }}" required>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama" id="agama" class="form-control" value="{{ $data->agama }}" required>
                </div>

                <p><b>Data Ayah Pemohon</b></p>
                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" value="{{ $data->nama_ayah }}" required>
                </div>

                <div class="form-group">
                    <label for="nik_ayah">NIK Ayah</label>
                    <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" value="{{ $data->nik_ayah }}" required>
                </div>

                <div class="form-group">
                    <label for="tempat_tanggal_lahir_ayah">Tempat/Tanggal Lahir Ayah</label>
                    <input type="text" name="tempat_tanggal_lahir_ayah" id="tempat_tanggal_lahir_ayah" class="form-control" value="{{ $data->tempat_tanggal_lahir_ayah }}" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" value="{{ $data->pekerjaan_ayah }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat_ayah">Alamat Ayah</label>
                    <input type="text" name="alamat_ayah" id="alamat_ayah" class="form-control" value="{{ $data->alamat_ayah }}" required>
                </div>

                <div class="form-group">
                    <label for="agama_ayah">Agama Ayah</label>
                    <input type="text" name="agama_ayah" id="agama_ayah" class="form-control" value="{{ $data->agama_ayah }}" required>
                </div>
                <p><b>Data Ibu Pemohon</b></p>
                <div class="form-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="{{ $data->nama_ibu }}" required>
                </div>

                <div class="form-group">
                    <label for="nik_ibu">NIK Ibu</label>
                    <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" value="{{ $data->nik_ibu }}" required>
                </div>

                <div class="form-group">
                    <label for="tempat_tanggal_lahir_ibu">Tempat/Tanggal Lahir Ibu</label>
                    <input type="text" name="tempat_tanggal_lahir_ibu" id="tempat_tanggal_lahir_ibu" class="form-control" value="{{ $data->tempat_tanggal_lahir_ibu }}" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" value="{{ $data->pekerjaan_ibu }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat_ibu">Alamat Ibu</label>
                    <input type="text" name="alamat_ibu" id="alamat_ibu" class="form-control" value="{{ $data->alamat_ibu }}" required>
                </div>

                <div class="form-group">
                    <label for="agama_ibu">Agama Ibu</label>
                    <input type="text" name="agama_ibu" id="agama_ibu" class="form-control" value="{{ $data->agama_ibu }}" required>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control">{{ $data->catatan }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
