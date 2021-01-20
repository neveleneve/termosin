@extends('template.master')
@section('title')
<title>Item - Termosin Store</title>
@endsection

@section('content')
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center"
        data-background="{{asset('assets/img/hero/category.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Detail Produk</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product_image_area" style="margin-bottom: -15%">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">
                    @for ($i = 0; $i < $jumlah; $i++) <div class="single_product_img">
                        <img src="{{asset('/images/item/'. $namagambar.'-'. $i .'.png')}}" class="img-fluid">
                </div>
                @endfor
            </div>
        </div>
        <div class="col-lg-8">
            <div class="single_product_text text-center">
                <h3>{{$dataitem[0]->namaitem}}</h3>
                <ul>
                    @if ($dataitem[0]->diskonstate == 0)
                    <li>Rp. {{number_format($dataitem[0]->harga, 0 , ',', '.')}}</li>
                    @else
                    @php
                    $diskon = $dataitem[0]->harga - ($dataitem[0]->harga * $dataitem[0]->diskon / 100)
                    @endphp
                    <li> Rp. {{number_format($diskon, 0 , ',', '.')}}</li>
                    <li class="discount"><s>Rp. {{number_format($dataitem[0]->harga, 0 , ',', '.')}}</s></li>
                    @endif
                </ul>
                <p>
                    {{File::get(public_path('/images/desc/'.$dataitem[0]->id.'.txt'))}}
                </p>
                <form action="/beli" method="post">
                    {{ csrf_field() }}
                    <div class="card_area">
                        <p>Jumlah Pembelian</p>
                        <div class="product_count d-inline-block">
                            <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                            <input class="product_count_item input-number" type="text" id="jumlah" name="jumlah"
                                value="1" min="1" max="10">
                            <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-8 offset-2">
                                <h4 class="mb-30 text-center">Pilihan Warna</h4>
                            </div>
                        </div>
                        <div class="row text-left">
                            @foreach ($datawarna as $item)
                            <div class="col-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="warna" id="warna"
                                            value="{{$item->id}}" required>
                                        {{$item->warna}}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if ($dataitem[0]->diskonstate == 0)
                        <input type="hidden" value="{{$dataitem[0]->harga}}" id="harga" name="harga">
                        @else
                        @php
                        $diskon = $dataitem[0]->harga - ($dataitem[0]->harga * $dataitem[0]->diskon / 100)
                        @endphp
                        <input type="hidden" value="{{$diskon}}" id="harga" name="harga">
                        @endif
                        <input type="hidden" value="{{$dataitem[0]->id}}" id="id_barang" name="id_barang">
                        <div class="add_to_cart">
                            <button type="submit" href="#" class="btn_3">Masukkan Keranjang</button>
                        </div>
                </form>
            </div>            
            <br>
            <div class="alert alert-warning">
                Alamat IP Anda <strong> {{ Request::ip() }} </strong>. Alamat IP Anda Tidak Kami Simpan Sampai Anda
                Melakukan Pemesanan.
            </div>
        </div>
    </div>
</div>
@endsection