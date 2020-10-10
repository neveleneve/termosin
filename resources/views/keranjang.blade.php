@extends('template.master')
@section('title')
<title>Keranjang - Termosin Store</title>
<script src="{{asset('assets/js/custom.js')}}"></script>
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
<br>
<section class="container mb-3">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning">
                <h5 class="text-center">Alamat IP Anda Saat ini : <strong> {{Request::ip()}}</strong>. Pastikan Alamat IP
                    Anda Tidak Berubah Untuk Melihat Keranjang Anda</h5>
            </div>
        </div>
    </div>
    <div class="row">
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
                    @php
                    $total = 0;
                    @endphp
                    @if ($datakeranjang != null)
                    @foreach ($datakeranjang as $item)
                    <tr>
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="{{ asset('/images/item/'.$item->images) }}" alt="" />
                                </div>
                                <div class="media-body">
                                    <p>{{ $item->namabarang }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>Rp {{ number_format($item->harga, 0, ",", ".") }} </h5>
                            <input type="hidden" name="harga{{$item->id}}" id="harga{{$item->id}}" value="{{$item->harga}}">
                        </td>
                        <td>
                            <div class="product_count">
                                <input class="input-number" id="jumlah{{$item->id}}" name="jumlah{{$item->id}}" type="number" value="{{$item->jumlah}}" min="0" max="10">
                            </div>
                        </td>
                        <td>
                            <h5> {{$item->warna}} </h5>
                        </td>
                        <td>
                            <h5 id="total{{$item->id}}">Rp {{ number_format($item->harga * $item->jumlah, 0, ",", ".") }}</h5>
                            @php
                            $total += $item->harga * $item->jumlah;
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Anda Belum Memiliki Item Dikeranjang</h3>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Total</h5>
                        </td>
                        <td>
                            <h5>Rp. {{ number_format($total, 0, ",", ".") }}</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
            <input type="submit" class="btn btn-warning btn-block" value="Lanjutkan Belanja">
        </div>
        <div class="col-0 col-sm-0 col-md-0 col-lg-4">
            
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
            <input type="submit" class="btn btn-success btn-block" value="Proses Pesanan">
        </div>
    </div>
</section>
@endsection