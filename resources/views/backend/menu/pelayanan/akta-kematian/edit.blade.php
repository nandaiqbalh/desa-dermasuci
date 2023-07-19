@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Surat</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_akta-kematian.update', $data->id) }}" method="POST">
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
                    <label for="tempat_tanggal_lahir">Tempat/Tanggal Lahir</label>
                    <input type="text" name="tempat_tanggal_lahir" id="tempat_tanggal_lahir" class="form-control" value="{{ $data->tempat_tanggal_lahir }}" required>
                </div>


                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $data->alamat }}" required>
                </div>

                <p><b>Data Termohon</b></p>

                <div class="form-group">
                    <label for="nama_termohon">Nama Termohon *</label>
                    <input required type="text" class="form-control" id="nama_termohon" name="nama_termohon" value="{{ $data->nama_termohon }}" required>
                </div>

                <div class="form-group">
                    <label for="bin_termohon">Bin/Binti *</label>
                    <input required type="text" class="form-control" id="bin_termohon" name="bin_termohon" value="{{ $data->bin_termohon }}" required>
                </div>

                <div class="form-group">
                    <label for="nik_termohon">NIK *</label>
                    <input required type="text" class="form-control" id="nik_termohon" name="nik_termohon" value="{{ $data->nik_termohon }}" required>
                </div>

                <div class="form-group">
                    <label for="ttl_termohon">Tempat Tanggal Lahir *</label>
                    <input required type="text" class="form-control" id="ttl_termohon" name="ttl_termohon" value="{{ $data->ttl_termohon }}" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin_termohon">Jenis Kelamin *</label>
                    <input required type="text" class="form-control" id="jenis_kelamin_termohon" name="jenis_kelamin_termohon" value="{{ $data->jenis_kelamin_termohon }}" required>
                </div>

                <div class="form-group">
                    <label for="agama_termohon">Agama *</label>
                    <input required type="text" class="form-control" id="agama_termohon" name="agama_termohon" value="{{ $data->agama_termohon }}" required>
                </div>

                <p> <b>Data Meninggal</b></p>

                <div class="form-group">
                    <label for="tanggal_meninggal">Tanggal Meninggal *</label>
                    <input required type="text" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" value="{{ $data->tanggal_meninggal }}" required>
                </div>

                <div class="form-group">
                    <label for="jam_meninggal">Jam Meninggal *</label>
                    <input required type="text" class="form-control" id="jam_meninggal" name="jam_meninggal" value="{{ $data->jam_meninggal }} WIB" required>
                </div>

                <div class="form-group">
                    <label for="tempat_meninggal">Tempat Meninggal *</label>
                    <input required type="text" class="form-control" id="tempat_meninggal" name="tempat_meninggal" value="{{ $data->tempat_meninggal }}" required>
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
