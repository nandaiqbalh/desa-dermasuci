@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Surat</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_pindah-domisili.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="no_surat">No Surat</label>
                    <input type="text" name="no_surat" id="no_surat" class="form-control" value="{{ $data->no_surat }}">
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}" required>
                </div>

                <div class="form-group">
                    <label for="no_kk">Nomor Kartu Keluarga</label>
                    <input type="text" name="no_kk" id="no_kk" class="form-control" value="{{ $data->no_kk }}" required>
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
                    <label for="alamat_asal">Alamat Asal</label>
                    <input type="text" name="alamat_asal" id="alamat_asal" class="form-control" value="{{ $data->alamat_asal }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat_tujuan">Alamat Tujuan</label>
                    <input type="text" name="alamat_tujuan" id="alamat_tujuan" class="form-control" value="{{ $data->alamat_tujuan }}" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan (Keluar/Masuk)</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
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
