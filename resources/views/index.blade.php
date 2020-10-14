@extends('template.master')
@section('title')
<title>Dashboard - Termosin Store</title>
@endsection
@section('content')
@include('template.loading')
<div class="slider-area ">
    <div class="slider-active">
        <div class="single-slider slider-height" data-background="{{asset('images/termosin.jpg')}}">
        </div>
    </div>
</div>
<section class="latest-product-area mt-5">
    <div class="container">
        <div class="row d-flex">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="mb-30 border-bottom border-dark">
                    <h1>Produk Kami</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($allproduct as $item)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 rounded">
                <div class="shadow single-product">
                    <div class="product-img">
                        <a href="/item/{{ $item->id }}">
                            <img class="rounded" src="{{asset('images/item/'.$item->img)}}">
                        </a>
                        @if ($item->diskonstate == 0)

                        @else
                        <div class="new-product">
                            <span>- {{$item->diskon}}%</span>
                            @if ($item->diskon >= 35)
                            <span>Best Offer</span>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="product-caption">
                        <h4><a href="/item/{{ $item->id }}">{{$item->namaitem}}</a>
                        </h4>
                        <div class="price">
                            <ul class="pb-3">
                                @if ($item->diskonstate == 0)
                                <li>Rp. {{number_format($item->harga, 0 , ',', '.')}}</li>
                                @else
                                @php
                                $diskon = $item->harga - ($item->harga * $item->diskon / 100)
                                @endphp
                                <li>Rp. {{number_format($diskon, 0 , ',', '.')}}</li>
                                @endif
                                @if ($item->diskonstate == 0)

                                @else
                                <span><del class="text-danger">Rp.
                                        {{number_format($item->harga, 0 , ',', '.')}}</del></span>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-5 pt-5 pb-5 rounded bg-dark">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span class="fa fa-lg fa-archive"></span> 
                                    Gratis Ongkos Kirim!
                                </h5>                                
                                <p class="card-text">
                                    Gratis Dimanapun Kamu Berada
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span class="fa fa-lg fa-unlock"></span> 
                                    Pembayaran Mudah!
                                </h5>                                
                                <p class="card-text">
                                    Metode Pembayaran Eksklusif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-2 pb-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span class="fa fa-lg fa-check"></span> 
                                    Barang Dijamin Berkualitas!
                                </h5>                                
                                <p class="card-text">
                                    Jaminan Kualitas Barang
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection