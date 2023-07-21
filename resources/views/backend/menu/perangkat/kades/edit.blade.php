@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Kepala</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_kades.update', $kades->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $kades->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <textarea class="form-control" id="jabatan" name="jabatan" rows="5" required>{{ $kades->jabatan }}</textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
