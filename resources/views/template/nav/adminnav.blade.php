<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    @yield('search')
    <ul class="navbar-nav ml-auto">
        <li class="nav-item nav-item-right">
            <a class="nav-link d-none d-md-block">{{Auth::user()['nama']}}</a>
        </li>
        <li class="nav-item nav-item-right">
            <a class="nav-link" href="/administrator/logout" onclick="javascript: return confirm('Keluar Sekarang?');"><i class="fa fa-sign-out-alt"></i></a>
        </li>
    </ul>
</nav>