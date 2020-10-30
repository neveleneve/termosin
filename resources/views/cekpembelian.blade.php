@extends('template.master')
@section('title')
<title>Cek Pembelian - Termosin Store</title>
@endsection

@section('content')
@include('template.loading')
<div class="slider-area">
    <div class="single-slider slider-height2 d-flex align-items-center"
        data-background="{{asset('assets/img/hero/category.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Cek Pembelian</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="/cek-pembelian" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="notrx" placeholder="Cari Nomor Transaksi">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>
@endsection