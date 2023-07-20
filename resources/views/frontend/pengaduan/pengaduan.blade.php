@extends('frontend.frontend_master')

@section('main_frontend')

<section class="ftco-section bg-light" id="blog-section">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Selamat Datang,</span>
                <h2 class="mb-4">Portal Kontak dan Pengaduan</h2>
                <p>Sampaikan kepada kami issue atau permasalahan yang anda alami.</p>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-8">
                <form action="{{ route('pengaduan.store') }}" method="POST" class="bg-light p-4 p-md-5 contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input required  name="nama" id="nama" type="text" class="form-control" placeholder="Nama Kamu" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">Nomor Telepon*</label>
                                <input required name="no_hp" id="no_hp" type="text" class="form-control" placeholder="No HP Kamu" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required name="email" id="email" type="email" class="form-control" placeholder="Email Kamu">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input required name="alamat" id="alamat" type="text" class="form-control" placeholder="Alamat Kamu">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subjek_aduan">Subjek*</label>
                                <input required name="subjek_aduan" id="subjek_aduan" type="text" class="form-control" placeholder="Subjek" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pesan_aduan">Aduan*</label>
                                <textarea name="pesan_aduan" id="pesan_aduan" cols="30" rows="7" class="form-control" placeholder="Pesan" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input required type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @foreach ($kontak as $item)
            <div class="col-md-4 d-flex pl-md-5">
                <div class="row">
                    <div class="dbox w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                            <p><span>Alamat:</span> {{$item -> alamat}}</p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                            <p><span>Phone:</span> <a href="">{{$item->telpon}}</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                            <p><span>Email:</span> <a href="#">{{$item ->email}}</a></p>
                        </div>
                    </div>

                </div>
                <!-- <div id="map" class="map"></div> -->
            </div>
            @endforeach


        </div>
    </div>
</section>

@endsection
