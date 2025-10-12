<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('adminlte/dist/img/logoUI-new.png') }}" class="img-circle elevation-0" alt="User Image">
    </div>
    <div class="info">
        <a wire:navigate href="{{ route('admin.dashboard') }}" class="d-block text-light">FMIPA Univ. Indonesia</a>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(session('login_as') === 'pegawai')

        <!-- Main Dashboard -->
        <li class="nav-item">
            <a wire:navigate href="{{ route('admin.dashboard') }}" class="nav-link @yield('adm-dashboard')">
                <i class="nav-icon fa-solid fa-house"></i>
                <p class="text-light">Main Dashboard</p>
            </a>
        </li>

        <!-- Data TA & Teknisi -->
        <li class="nav-item">
            <a wire:navigate href="{{ route('admin.pegawai.index') }}" class="nav-link @yield('adm-pegawai')">
                <i class="nav-icon fa-solid fa-user-graduate"></i>
                <p class="text-light">Data TA & Teknisi</p>
            </a>
        </li>

        <!-- Data Mitra & Institusi -->
        <li class="nav-item">
            <a wire:navigate href="{{ route('admin.mitra.index') }}" class="nav-link @yield('adm-mitra')">
                <i class="nav-icon fa-solid fa-user-graduate"></i>
                <p class="text-light">Data Institusi & Mitra</p>
            </a>
        </li>

        <!-- Jenis Pengujian -->
        <li class="nav-item">
            <a wire:navigate href="{{ route('admin.jenis-pengujian.index') }}" class="nav-link @yield('adm-jenis-pengujian')">
                <i class="nav-icon fa-solid fa-flask"></i>
                <p class="text-light">Jenis Uji Material</p>
            </a>
        </li>

        <!-- Hasil Pengujian -->
        <li class="nav-item">
            <a wire:navigate href="{{ route('admin.hasil-pengujian.index') }}" class="nav-link @yield('adm-hasil-pengujian')">
                <i class="nav-icon fa-solid fa-flask"></i>
                <p class="text-light">Hasil Uji Material</p>
            </a>
        </li>

        <!-- Laporan Keuangan -->
        <!-- <li class="nav-item">
            <a wire:navigate href="{{-- route('admin.laporan-keuangan.index') --}}" class="nav-link @yield('adm-laporan-keuangan')">
                <i class="nav-icon fa-solid fa-print"></i>
                <p class="text-light">Laporan Keuangan</p>
            </a>
        </li> -->

        <!-- Keluar -->
        <li class="nav-item">
            <a wire:navigate href="{{ url('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-circle-xmark"></i>
                <p class="text-light">Keluar</p>
            </a>
        </li>
        @endif

        @if(session('login_as') === 'mitra')
        <!-- Main Dashboard -->
        <li class="nav-item">
            <a wire:navigate href="{{ route('mitra.dashboard') }}" class="nav-link @yield('mt-dashboard')">
                <i class="nav-icon fa-solid fa-house"></i>
                <p class="text-light">Main Dashboard</p>
            </a>
        </li>

        <!-- Uji Material -->
        <li class="nav-item">
            <a wire:navigate href="{{ route('mitra.pengujian-material.index') }}" class="nav-link @yield('mt-pengujian-material')">
                <i class="nav-icon fa-solid fa-flask"></i>
                <p class="text-light">Pengujian Material</p>
            </a>
        </li>

        <!-- Keluar -->
        <li class="nav-item">
            <a wire:navigate href="{{ url('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-circle-xmark"></i>
                <p class="text-light">Keluar</p>
            </a>
        </li>
        @endif
    </ul>
    <!-- /.ul nav -->
</nav>
<!-- /.sidebar-menu -->