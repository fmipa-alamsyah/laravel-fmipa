<!-- Left navbar links -->
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a href="#" class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        @if (session('login_as') === 'pegawai')
        <a href="#" class="nav-link text-dark">Anda login sebagai Administrator</a>
        @else
        <a href="#" class="nav-link text-dark">Anda login sebagai Mitra</a>
        @endif
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-dark">{{ session('session_name') }}</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-widget="fullscreen" role="button"><i class="fas fa-expand-arrows-alt"></i></a>
    </li>
</ul>