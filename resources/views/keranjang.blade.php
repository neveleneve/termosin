@extends('template.master')
@section('title')
<title>Keranjang - Termosin Store</title>
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
                        <h2>Keranjang</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<section class="container">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning">
                <h5 class="text-center">
                    Alamat IP Anda Saat ini : <strong> {{Request::ip()}}</strong>. Segera Proses Keranjang Anda Agar
                    Sistem Kami Tetap Menjaga Keranjang Anda
                </h5>
            </div>
        </div>
    </div>
    <form action="/proseskeranjang" method="post">
        {{ csrf_field() }}
        <div class="row mb-2">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Warna</th>
                                <th scope="col"></th>
                                <th class="text-right" scope="col">Subtotal</th>
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
                                    <input type="hidden" name="idkrj[]" id="idkrj" value="{{$item->id}}">
                                    <a title="Hapus Item" href="/deletekeranjang/{{$item->id}}"
                                        class="mt-2 btn btn-sm btn-outline-danger btn-block"
                                        onclick="return confirm('Hapus Data Dari Keranjang Anda?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>
                                    <input class="form-control-plaintext" type="text" value="{{ $item->namabarang }}">

                                </td>
                                <td>
                                    <input class="form-control-plaintext text-nowarp" type="text"
                                        value="Rp {{ number_format($item->harga, 2, ",", ".") }}">
                                    <input type="hidden" id="harga{{$item->id}}" value="{{$item->harga}}">
                                </td>
                                <td>
                                    <input class="form-control-plaintext" id="jumlah{{$item->id}}" name="jumlah[]"
                                        oninput="jumlahbelanja({{$item->id}})" type="number" value="{{$item->jumlah}}"
                                        min="1">
                                </td>
                                <td>
                                    <p>
                                        {{$item->warna}}
                                    </p>
                                </td>
                                <td>
                                    @php
                                    $subtotal = 0;
                                    if ($item->jumlah >= 5) {
                                    $subtotal = ($item->jumlah * $item->harga) - (0.15 * $item->jumlah * $item->harga);
                                    }elseif ($item->jumlah >= 10) {
                                    $subtotal = ($item->jumlah * $item->harga) - (0.4 * $item->jumlah * $item->harga);
                                    }else {
                                    $subtotal = ($item->jumlah * $item->harga);
                                    }
                                    @endphp
                                    @if ($item->jumlah >= 10)
                                    <span class="badge badge-danger" id="badge{{$item->id}}">
                                        Diskon 40%
                                    </span>
                                    @elseif ($item->jumlah >= 5)
                                    <span class="badge badge-danger" id="badge{{$item->id}}">
                                        Diskon 15%
                                    </span>
                                    @else
                                    <span class="badge badge-danger" id="badge{{$item->id}}" hidden>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="float-right" name="subtotal{{$item->id}}" id="subtotal{{$item->id}}">
                                        Rp {{ number_format($subtotal, 2, ",", ".") }}
                                    </span>
                                    <input class="subtotal" type="hidden" id="hiddensubtotal{{$item->id}}"
                                        value="{{$subtotal}}">
                                    @php
                                    $total += $subtotal;
                                    @endphp
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">
                                    <h3 class="text-center">Anda Belum Memiliki Item Dikeranjang</h3>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot class="bg-dark">
                            <tr class="text-light">
                                <th class="text-right" colspan="6">
                                    Total
                                </th>
                                <th>
                                    <input class="form-control-plaintext text-light text-right" id="total" type="text"
                                        value="Rp {{ number_format($total, 2, ",", ".") }}" disabled>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <a href="/" class="btn btn-outline-info btn-block">Lanjutkan Belanja</a>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-2">

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <input type="hidden" id="hiddentotal" value="{{$total}}">
                @if ($datakeranjang != null)
                <input type="submit" class="btn btn-outline-success btn-block" value="Proses Keranjang">
                @else

                @endif
            </div>
        </div>
    </form>
</section>
@endsection
@section('customjs')
<script src="{{asset('assets/js/custom.js')}}"></script>
@endsection