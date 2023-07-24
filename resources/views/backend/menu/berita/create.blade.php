@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Buat Berita</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
                </div>
                <div class="form-group">
                    <label for="subjudul_berita">Sub Judul Berita</label>
                    <input type="text" class="form-control" id="subjudul_berita" name="subjudul_berita" required>
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    <textarea class="form-control" id="isi_berita" name="isi_berita" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" required>
                </div>
                <div class="form-group">
                    <label for="galeri">Gallery Photos:</label>
                    <input type="file" name="galeri[]" id="galeri" class="form-control-file" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
