<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Desa Dermasuci</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a href="{{url('/')}}" class="nav-link"><span>Beranda</span></a></li>
                <li class="nav-item"><a href="{{route('potensi.index')}}" class="nav-link"><span>Potensi</span></a></li>
                <li class="nav-item"><a href="{{route('pelayanan.index')}}" class="nav-link"><span>Pelayanan</span></a></li>
                <li class="nav-item"><a href="{{route('berita.index')}}" class="nav-link"><span>Berita</span></a></li>
                <li class="nav-item"><a href="{{route('pengaduan.index')}}" class="nav-link"><span>Kontak & Pengaduan</span></a></li>

            </ul>
        </div>
    </div>
</nav>
