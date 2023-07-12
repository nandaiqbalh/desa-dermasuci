@extends('frontend.frontend_master')

@section('main_frontend')

<section class="ftco-section bg-light" id="blog-section">
    <div class="container">
        <div class="row d-flex">

            @foreach ($beritas as $berita)

            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="single.html" class="block-20" style="background-image: url('{{ asset('images/' . $berita->thumbnail) }}');">
                    </a>
                    <div class="text mt-3 float-right d-block">
                        <div class="d-flex align-items-center mb-3 meta">
                            <p class="mb-0">
                                <span class="mr-2">{{ $berita->created_at->format('F d, Y') }}</span>
                                <a href="#" class="mr-2">{{ $berita->penulis }}</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="single.html">{{ $berita->judul_berita }}</a></h3>
                        <p>{{ $berita->subjudul_berita }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
