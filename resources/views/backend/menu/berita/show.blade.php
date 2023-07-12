@extends('backend.backend_master')

@section('main_backend')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Detail Berita</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <img src="{{ asset('images/' . $berita->thumbnail) }}" alt="Thumbnail" class="img-fluid" style="max-width: 300px; max-height: 200px">
                    </div>
                    <div class="mb-3">
                        <p class="font-weight-bold">{{ $berita->judul_berita }}</p>
                        <p class="font-weight-bold">{{ $berita->subjudul_berita }}</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div>
                        <p class="font-weight-bold">Penulis: {{ $berita->penulis }}</p>
                        <h6 class="font-weight-bold">Isi Berita:</h6>
                        <p>{{ $berita->isi_berita }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
