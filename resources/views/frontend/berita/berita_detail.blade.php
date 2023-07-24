@extends('frontend.frontend_master')

@section('main_frontend')
<section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3">{{$berita->judul_berita}}</h2>
            <p>{{$berita->subjudul_berita}}.</p>
            <p>
              <img src="{{ asset('images/' . $berita->thumbnail) }}" alt="" class="img-fluid">
            </p>
            <p>{!! nl2br($berita->isi_berita) !!}</p>

            @if (!empty($berita->galeri))
            <div class="gallery">
                @foreach (json_decode($berita->galeri) as $photo)
                    <img src="{{ asset('storage/' . $photo) }}" alt="Gallery Photo" width="200">
                @endforeach
            </div>
        @endif

        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Berita Terbaru</h3>

            @foreach($beritas as $berita)
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ asset('images/' . $berita->thumbnail) }});"></a>
                <div class="text">
                    <h3 class="heading"><a href="{{ route('berita.show', $berita->id) }}">{{ $berita->judul_berita }}</a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> {{ $berita->created_at->format('F d, Y') }}</a></div>
                        <div><a href="#"><span class="icon-person"></span> {{ $berita->penulis }}</a></div>
                        <!-- Add other relevant data here, e.g., comment count -->
                    </div>
                </div>
            </div>
            @endforeach

          </div>

        </div>

      </div>
    </div>
  </section> <!-- .section -->

@endsection
