@extends('template.master')
@section('title')
<title>Keranjang - Termosin Store</title>
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
                        <h2>Keranjang</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakeranjang as $item)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="assets/img/arrivel/arrivel_1.png" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $item->id_item }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5> {{$item->harga}} </h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input class="input-number" type="number" value="{{$item->jumlah}}" min="0" max="10">
                                </div>
                            </td>
                            <td>
                                <h5> {{$item->id_item_color}} </h5>
                            </td>
                            <td>
                                <h5>$720.00</h5>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>$2160.00</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="#">Continue Shopping</a>
                    <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                </div>
            </div>
        </div>
</section>
@endsection