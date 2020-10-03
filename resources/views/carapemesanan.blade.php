@extends('template.master')
@section('title')
<title>Cek Pembelian - Termosin Store</title>
@endsection

@section('content')
@include('template.loading')
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
                <img class="img-fluid" src="https://hijacksandals.com/wp-content/uploads/2020/08/hto-1x-1536x203.jpg">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">- Kunjungi <strong><a class="text-dark" href="/">Termosin Store</a></strong></li>
                    <li class="list-group-item list-group-item-action">- Pilih item yang mau kamu beli, sesuaikan jumlah dan warnanya, lalu tekan tombol 'Masukkan Keranjang'</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid" src="https://hijacksandals.com/wp-content/uploads/2020/08/hto-2-2048x270.jpg">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">dfgasihdfias</li>
                    <li class="list-group-item list-group-item-action">xxxxxxxxxxxxxxx</li>
                    <li class="list-group-item list-group-item-action">Morbi leo risus</li>
                    <li class="list-group-item list-group-item-action">Porta ac consectetur ac</li>
                    <li class="list-group-item list-group-item-action">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" allowFullScreen="true"
                    
                        src="https://drive.google.com/file/d/1FK6ganINiRCZRL_ohoRxs3qtesCTjyEw/preview"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
