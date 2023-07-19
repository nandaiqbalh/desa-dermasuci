@extends('frontend.frontend_master')

@section('main_frontend')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">

        @foreach ($highlights as $item)

        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container-fluid px-md-0">
                <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                    <div class="one-third order-md-last img" style="background-image:url({{ asset('images/' . $item->image_file) }});">
                        <div class="overlay"></div>
                        <div class="overlay-1"></div>
                    </div>
                    <div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading"> {{$item -> subtitle}} </span>
                            <h1 class="mb-4 mt-3">{{$item -> title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

@foreach ($profil as $item)
<br>
<br>
<br>
<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 col-lg-5 d-flex">
                <div class="img-about img d-flex align-items-stretch">
                    <div class="overlay"></div>
                    <img src="{{ asset('images/' . $item->image_file) }}" alt="Image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
                <div class="py-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <span class="subheading">Profil Desa</span>
                            <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">{{$item->title}}</h2>
                            <p>{!! nl2br($item->subtitle) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<br><br>
@endsection
