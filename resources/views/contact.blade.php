@extends('template.master')
@section('title')
<title>Contact - Termosin Store</title>
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
                        <h2>Kontak</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="contact-title">Tetap Bersama Kami</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="media contact-info text-center">
                    <div class="media-body">
                        <h5><i class="fa fa-home"></i> Alamat</h5>
                        <a target="__blank" href="//maps.google.com/maps?q=loc:0.919919,104.491238">
                            <h3>Tanjungpinang, Kepulauan Riau</h3>
                        </a>
                        <p>Tanjungpinang Timur, 29123</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="media contact-info">
                    <div class="media-body">
                        <h5><i class="fab fa-instagram"></i> Instagram</h5>
                        <a target="__blank" href="//instagram.com/termosin.store">
                            <h3>@termosin,store</h3>
                        </a>
                        <p>Direct Message</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="media contact-info">
                    <div class="media-body">
                        <h5><i class="fab fa-whatsapp"></i> Whatsapp</h5>
                        <a target="__blank" href="//api.whatsapp.com/send?phone=6282283784873">
                            <h3>+62 822 8378 4873</h3>
                        </a>
                        <p>Senin - Jum'at, 09:00 - 22:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="media contact-info">
                    <div class="media-body">
                        <h5><i class="fab fa-telegram"></i> Telegram</h5>
                        <a target="__blank" href="//t.me/termosinstore">
                            <h3>@termosinstore</h3>
                        </a>
                        <p>Senin - Kamis, 09:00 - 22:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="media contact-info">
                    <div class="media-body">
                        <h5><i class="fa fa-envelope"></i> Email</h5>
                        <h3>admin@jonatha.xyz</h3>
                        <p>Berikan Kami Saran Kapanpun, Dimanapun!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
