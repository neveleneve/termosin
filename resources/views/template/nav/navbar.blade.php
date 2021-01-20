<div class="header-area">
    <div class="main-header ">
        <div class="header-bottom header-sticky bg-dark">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
                        <div class="logo">
                            <a href="/"><img src="{{asset('images/logo termosin.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="main-menu align-items-center d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="text-light" href="/">Beranda</a></li>
                                    <li><a class="text-light" href="/cara-pemesanan">Cara Pemesanan</a></li>
                                    <li><a class="text-light" href="/cek-pembelian">Cek Pembelian</a> </li>
                                    <li><a class="text-light" href="/keranjang">Keranjang</a> </li>
                                    {{-- <li><a class="text-light" href="/kontak">Kontak</a></li> --}}
                                    <li><a class="text-light" href="/tentang">Tentang Kami</a> </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 fix-card">
                        <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                            <li class="d-none d-lg-block">
                                <div class="form-box f-right ">
                                    <form action="/search" method="post">
                                        {{ csrf_field() }}
                                        <input type="text" name="Search" placeholder="Pencarian">
                                        <div class="search-icon">
                                            <i class="fas fa-search special-tag"></i>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>