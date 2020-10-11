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
<br>
<section class="container mb-3">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning">
                <h5 class="text-center">Alamat IP Anda Saat ini : <strong> {{Request::ip()}}</strong>. Pastikan Alamat
                    IP
                    Anda Tidak Berubah Untuk Melihat Keranjang Anda</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Warna</th>
                        <th class="text-right w-25" scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @if ($datakeranjang != null)
                    @foreach ($datakeranjang as $item)
                    <tr class="text-nowrap">
                        <td>
                            <form action="/deletekeranjang" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" id="idkeranjang" name="idkeranjang" value="{{$item->id}}">
                                <button type="submit" class="btn btn-sm btn-outline-danger btn-block">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <p>
                                {{ $item->namabarang }}
                            </p>
                        </td>
                        <td>
                            <p>
                                Rp {{ number_format($item->harga, 2, ",", ".") }}
                            </p>
                            <input type="hidden" id="harga{{$item->id}}" value="{{$item->harga}}">
                        </td>
                        <td>
                            <input class="form-control-plaintext" id="jumlah{{$item->id}}" name="jumlah{{$item->id}}"
                                oninput="jumlahbelanja({{$item->id}})" type="number" value="{{$item->jumlah}}" min="1">
                        </td>
                        <td>
                            <p>
                                {{$item->warna}}
                            </p>
                        </td>
                        <td>
                            <p>
                                <input class="form-control-plaintext text-right" id="subtotal{{$item->id}}"
                                    value="Rp {{ number_format($item->harga * $item->jumlah, 2, ",", ".") }}" disabled>
                            </p>
                            <input class="subtotal" type="hidden" id="hiddensubtotal{{$item->id}}"
                                value="{{$item->harga * $item->jumlah}}">
                            @php
                            $total += $item->harga * $item->jumlah;
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">
                            <h3 class="text-center">Anda Belum Memiliki Item Dikeranjang</h3>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Total</h5>
                        </td>
                        <td>
                            <input class="form-control-plaintext text-right" id="total" type="text"
                                value="Rp {{ number_format($total, 2, ",", ".") }}" disabled>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="/proseskeranjang" method="post">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <input type="hidden" id="hiddentotal" value="{{$total}}">
                <input type="submit" class="btn btn-outline-info btn-block" value="Lanjutkan Belanja">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-2">

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <a href="/checkout" class="btn btn-outline-success btn-block">Proses Pesanan</a>
            </div>
        </div>
    </form>
</section>
<script>
    function jumlahbelanja(id) {
        var u = document.getElementById("hiddentotal");
        var v = document.getElementById("subtotal"+id);
        var w = document.getElementById("total");
        var x = document.getElementById("jumlah"+id);
        var y = document.getElementById("harga"+id);
        var z = document.getElementById("hiddensubtotal"+id);
        z.value = x.value * y.value;
        v.value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(x.value * y.value);
        var sum = 0;
        $('.subtotal').each(function(){
            sum += parseFloat(this.value);
        });
        u.value = sum;
        w.value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(sum);
    }
    
</script>
@endsection