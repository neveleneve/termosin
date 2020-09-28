@extends('template.master')
@section('title')
<title>Item - Termosin Store</title>
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
                        <h2>Detail Produk</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product_image_area">
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
                <p>
                    {{File::get(public_path('/images/desc/'.$dataitem[0]->id.'.txt'))}}
                </p>
                <div class="card_area">
                    <div class="">
                        <p>Jumlah Pembelian</p>
                        <div class="product_count d-inline-block">
                            <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                            <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                            <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                        </div>
                        <p>
                            Harga <br>
                            @if ($dataitem[0]->diskonstate == 1)
                            Rp.
                            {{number_format($dataitem[0]->harga - ($dataitem[0]->harga * $dataitem[0]->diskon / 100), 0, ',', '.')}}
                            @else
                            Rp. {{number_format($dataitem[0]->harga, 0, ',', '.')}}
                            @endif
                        </p>
                    </div>
                    <div class="single-element-widget mt-30 text-center">
                        <h4 class="mb-30">Pilihan Warna</h4>
                        <div class="default-select" id="default-select">
                            <select id="warna" name="warna">
                                @foreach ($datawarna as $item)
                                <option value="{{ $item->warna }}">{{ $item->warna }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="add_to_cart">
                        <a href="#" class="btn_3">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
