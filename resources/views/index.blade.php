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
<section class="latest-product-area section-padding" style="margin-bottom: -20%">
    <div class="container">
        <div class="row product-btn d-flex">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="section-tittle mb-30">
                    <h2>All Products</h2>
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach ($allproduct as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-product mb-60">
                            <div class="product-img">
                                <a href="/item/{{ $item->id }}">
                                    <img src="{{asset('images/item/'.$item->img)}}">
                                </a>
                                @if ($item->diskonstate == 0)

                                @else
                                <div class="new-product">
                                    <span>{{$item->diskon}}%</span>
                                    @if ($item->diskon >= 35)
                                    <span>Penawaran Terbaik</span>
                                    @endif
                                </div>
                                @endif
                            </div>
                            <div class="product-caption">
                                <h4><a href="/item/{{ $item->id }}">{{$item->namaitem}}</a>
                                </h4>
                                <div class="price">
                                    <ul>
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
                                        <li class="discount">Rp. {{number_format($item->harga, 0 , ',', '.')}}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="shop-method-area section-padding30" style="margin-top: -10%">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Gratis Ongkos Kirim!</h6>
                            <p>Gratis Dimanapun Kamu Berada</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Pembayaran Aman dan Terjamin!</h6>
                            <p>Metode Pembayaran Eksklusif</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-check"></i>
                            <h6>Barang Dijamin Berkualitas!</h6>
                            <p>Jaminan Kualitas Barang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection