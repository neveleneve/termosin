@extends('template.master')
@section('title')
<title>Cara Pemesanan - Termosin Store</title>
@endsection

@section('content')
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center"
        data-background="{{asset('assets/img/hero/category.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Cara Pemesanan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid" src="{{asset('images/langkah1.jpg')}}">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        - Kunjungi <strong><a class="text-dark" href="/">Termosin Store</a></strong>.
                    </li>
                    <li class="list-group-item list-group-item-action">
                        - Pilih item yang mau kamu beli, sesuaikan jumlah dan warnanya, lalu tekan tombol 'Masukkan
                        Keranjang'.
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid" src="{{asset('images/langkah2.jpg')}}">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        - Setelah selesai memilih barang, kamu bisa langsung lihat ke Menu Keranjang untuk melihat
                        barang yang kamu beli.
                    </li>
                    <li class="list-group-item list-group-item-action">
                        - Kamu bisa melihat dan mengatur jumlah pembelianmu di Menu Keranjang. Untuk melanjutkan, tekan
                        tombol Proses Keranjang.
                    </li>
                    <li class="list-group-item list-group-item-action">
                        - Kamu akan diarahkan ke Menu Check Out untuk mengisi detail pengiriman dan data diri.
                    </li>

                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid" src="{{asset('images/langkah3.jpg')}}">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        - Klik tombol Pilih Metode Pembayaran untuk melihat cara pembayaran sesuai dengan media
                        pembayaranmu.
                    </li>
                    <li class="list-group-item list-group-item-action">
                        - Klik tombol proses untuk melanjutkan.
                    </li>
                    <li class="list-group-item list-group-item-action">
                        - Kamu akan diarahkan ke halaman Cek Pembelian untuk melihat detail pembelianmu. Simpan nomor
                        transaksi yang ada di halaman Cek Pembelian agar kamu bisa cek pembelianmu.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection