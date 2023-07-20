@extends('frontend.frontend_master')

@section('main_frontend')
<section class="ftco-section bg-light" id="blog-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Selamat datang,</span>
                <h2 class="mb-4">Potensi Desa</h2>
                <p>Cari tahu mengenai Desa Dermasuci dan segala potensinya.</p>
            </div>
        </div>

        <div class="row d-flex">

            @foreach ($potensi as $items)

            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="#" class="block-20" style="background-image: url('{{ asset('images/' . $items->image_file) }}');">
                    </a>
                    <div class="text mt-3 float-right d-block">

                        <h3 class="heading"><a href="">{{ $items->title }}</a></h3>
                        <p>{{ $items->subtitle }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

@endsection
