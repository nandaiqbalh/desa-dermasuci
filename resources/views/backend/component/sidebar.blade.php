

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Desa Dermasuci <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Profil Desa
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{route('profil.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profil Desa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#perangkatPages"
                    aria-expanded="true" aria-controls="perangkatPages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Perangkat Desa</span>
                </a>
                <div id="perangkatPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Perangkat Desa</h6>
                        <a class="collapse-item" href="{{route('admin_kades.index')}}">Kepala Desa</a>
                        <a class="collapse-item" href="{{route('admin_perangkat.index')}}">Perangkat Desa</a>

                    </div>
                </div>
            </li>
             <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('highlights.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sorotan</span></a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_potensi.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Potensi Desa</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Pelayanan
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pelayanan Digital</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pelayanan</h6>
                        <a class="collapse-item" href="{{route('admin_pembuatan-ktp.index')}}">Pembuatan KTP</a>
                        <a class="collapse-item" href="{{route('admin_perubahan-ktp.index')}}">Perubahan KTP</a>
                        <a class="collapse-item" href="{{route('admin_permohonan-kk.index')}}">Permohonan KK</a>
                        <a class="collapse-item" href="{{route('admin_keterangan-domisili.index')}}">Keterangan Domisili</a>
                        <a class="collapse-item" href="{{route('admin_pindah-domisili.index')}}">Pindah Domisili</a>
                        <a class="collapse-item" href="{{route('admin_permohonan-skck.index')}}">Permohonan SKCK</a>
                        <a class="collapse-item" href="{{route('admin_permohonan-sktm.index')}}">Permohonan SKTM</a>
                        <a class="collapse-item" href="{{route('admin_keterangan-usaha.index')}}">Keterangan Usaha</a>
                        <a class="collapse-item" href="{{route('admin_akta-kelahiran.index')}}">Akta Kelahiran</a>
                        <a class="collapse-item" href="{{route('admin_akta-kematian.index')}}">Akta Kematian</a>
                        <a class="collapse-item" href="{{route('admin_pengantar-nikah.index')}}">Pengantar Nikah</a>

                    </div>
                </div>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Berita dan Pengumuman
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_berita.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Berita</span></a>
            </li>

             <!-- Heading -->
             <div class="sidebar-heading">
                Kontak dan Pengaduan
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKontak"
                    aria-expanded="true" aria-controls="collapseKontak">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kontak dan Pengaduan</span>
                </a>
                <div id="collapseKontak" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kontak dan Pengaduan</h6>
                        <a class="collapse-item" href="{{route('admin_kontak.index')}}">Kontak</a>
                        <a class="collapse-item" href="{{route('admin_pengaduan.index')}}">Pengaduan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
        <!-- End of Sidebar -->

