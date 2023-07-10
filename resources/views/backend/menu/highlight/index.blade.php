@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Highlights</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('highlights.create') }}" class="btn btn-primary mb-3">Create Highlight</a>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($highlights as $highlight)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $highlight->title }}</td>
                                <td>{{ $highlight->subtitle }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $highlight->image_file) }}" alt="Image" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('highlights.edit', $highlight->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('highlights.destroy', $highlight->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
