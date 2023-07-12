@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Sorotan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('highlights.update', $highlight->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $highlight->title }}" required>
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                        value="{{ $highlight->subtitle }}" required>
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
