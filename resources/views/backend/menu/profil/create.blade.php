@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Buat Profil</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="subtitle">Profil</label>
                    <textarea class="form-control" id="subtitle" name="subtitle" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image_file">Peta</label>
                    <input type="file" class="form-control-file" id="image_file" name="image_file" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
