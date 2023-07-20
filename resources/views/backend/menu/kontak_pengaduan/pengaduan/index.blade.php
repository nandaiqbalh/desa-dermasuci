@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Pengaduan Desa</h6>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;" class="text-center">No.</th>
                            <th style="width: 20%;">Nama</th>
                            <th style="width: 10%;">No. Telp</th>
                            <th style="width: 30%;">Subjek Aduan</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 10%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <a href="https://wa.me/{{ $item->no_hp }}" target="_blank" class="btn btn-success">
                                        <i class="fab fa-whatsapp" style="width: 40px;"></i>
                                    </a>
                                </td>
                                 <td>{{ $item->subjek_aduan }}</td>
                                 <td>
                                    @if ($item->status == 0)
                                        <a href="{{ route('admin_pengaduan-dalam-review', $item->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @elseif ($item->status == 1)
                                        <a href="{{ route('admin_pengaduan-selesai', $item->id) }}" class="btn btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin_pengaduan.show', $item->id) }}" class="btn btn-info" title="View Detail"><i class="fas fa-eye"></i></a>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus Profil</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus pengaduan ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin_pengaduan.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
