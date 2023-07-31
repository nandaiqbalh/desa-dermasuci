@extends('frontend.frontend_master')

@section('main_frontend')

<section class="ftco-section bg-light" id="blog-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Selamat Datang,</span>
                <h2 class="mb-4">Portal Berita</h2>
                <p>Temukan apa yang terjadi baru-baru ini.</p>
            </div>
        </div>
        <div class="row d-flex">

            @foreach ($beritas as $berita)

            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="{{ route('berita.show', $berita->id) }}" class="block-20" style="background-image: url('{{ asset('images/' . $berita->thumbnail) }}');">
                    </a>
                    <div class="text mt-3 float-right d-block">
                        <div class="d-flex align-items-center mb-3 meta">
                            <p class="mb-0">
                                <span class="mr-2">{{ $berita->created_at->format('F d, Y') }}</span>
                                <a href="#" class="mr-2">{{ $berita->penulis }}</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="{{ route('berita.show', $berita->id) }}">{{ $berita->judul_berita }}</a></h3>
                        <p>{{ $berita->subjudul_berita }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
