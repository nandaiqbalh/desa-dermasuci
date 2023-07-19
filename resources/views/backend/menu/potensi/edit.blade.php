@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Potensi</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_potensi.update', $potensi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Nama Potensi</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $potensi->title }}" required>
                </div>
                <div class="form-group">
                    <label for="subtitle">Deskripsi</label>
                    <textarea class="form-control" id="subtitle" name="subtitle" rows="5" required>{{ $potensi->subtitle }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image_file">Image</label>
                    <input type="file" class="form-control-file" id="image_file" name="image_file">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
