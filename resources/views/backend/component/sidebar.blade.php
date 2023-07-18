

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
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Profil Desa
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('highlights.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sorotan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('profil.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profil Desa</span></a>
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

        </ul>
        <!-- End of Sidebar -->

