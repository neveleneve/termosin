@extends('template.master')
@section('title')
<title>About - Termosin Store</title>
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
                        <h2>Tentang Kami</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section">
    <div class="container">

    </div>
</section>
@endsection
