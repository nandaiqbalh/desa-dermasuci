@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Surat Pengantar Pembuatan KTP</h6>
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
                            <th>No Surat</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>NIK</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembuatan_ktp as $pembuatanKTP)
                            <tr>
                                <td>{{ $pembuatanKTP->no_surat }}</td>
                                <td>{{ $pembuatanKTP->nama }}</td>
                                <td><a href="https://wa.me/{{ $pembuatanKTP->no_hp }}" target="_blank" class="btn btn-success">Kirim Pesan</a></td>
                                <td>{{ $pembuatanKTP->nik }}</td>
                                <td>
                                        @if ($pembuatanKTP->status == 0)
                                            <a href="{{ route('pembuatan-ktp-dalam-review', $pembuatanKTP->id) }}" class="btn btn-warning">Dalam Review</a>
                                        @elseif ($pembuatanKTP->status == 1)
                                            <a href="{{ route('pembuatan-ktp-selesai', $pembuatanKTP->id) }}" class="btn btn-success">Selesai</a>
                                        @endif
                                </td>

                                <td>
                                        <a href="{{ route('admin_pembuatan-ktp.edit', $pembuatanKTP->id) }}" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin_pembuatan-ktp.print', $pembuatanKTP->id) }}" class="btn btn-info" title="Print as PDF"><i class="fas fa-file-pdf"></i></a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $pembuatanKTP->id }}" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $pembuatanKTP->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $pembuatanKTP->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $pembuatanKTP->id }}">Konfirmasi Hapus Pengajuan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus pengajuan ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('admin_pembuatan-ktp.destroy', $pembuatanKTP->id) }}" method="POST">
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
