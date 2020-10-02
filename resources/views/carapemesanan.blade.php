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
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid" src="https://hijacksandals.com/wp-content/uploads/2020/08/hto-1x-1536x203.jpg">
                <p>1. Bla bla bla</p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                        src="https://drive.google.com/file/d/1FK6ganINiRCZRL_ohoRxs3qtesCTjyEw/preview"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection