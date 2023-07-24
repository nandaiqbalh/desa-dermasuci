@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Berita</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ $berita->judul_berita }}" required>
                </div>
                <div class="form-group">
                    <label for="subjudul_berita">Sub Judul Berita</label>
                    <input type="text" class="form-control" id="subjudul_berita" name="subjudul_berita" value="{{ $berita->subjudul_berita }}" required>
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    <textarea class="form-control" id="isi_berita" name="isi_berita" rows="3" required>{{ $berita->isi_berita }}</textarea>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                </div>
                <div class="form-group">
                    <label for="galeri">Change Gallery Photos:</label>
                    <input type="file" name="galeri[]" id="galeri" class="form-control-file" multiple>
                </div>
                <div class="form-group">
                    <label for="current_thumbnail">Current Thumbnail</label>
                    <div class="mb-2">
                        <img src="{{ asset('images/' . $berita->thumbnail) }}" alt="Current Thumbnail" class="img-fluid" style="max-width: 300px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
