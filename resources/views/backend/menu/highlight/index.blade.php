@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Sorotan</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('highlights.create') }}" class="btn btn-primary mb-3">Buat Sorotan</a>
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
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $highlight->id }}">Delete</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $highlight->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $highlight->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $highlight->id }}">Delete Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this highlight?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('highlights.destroy', $highlight->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
