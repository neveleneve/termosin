@extends('template.master')
@section('title')
<title>Check Out - Termosin Store</title>
@endsection

@section('content')
@include('template.loading')
<div class="slider-area mb-3">
    <div class="single-slider slider-height2 d-flex align-items-center"
        data-background="{{asset('assets/img/hero/category.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Check Out</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container mb-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <h3 class="text-center">Detail Pengiriman</h3>
            <form class="row" action="#" method="post">
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" id="nohp" name="hohp" placeholder="Nomor Handphone"
                        required>
                </div>
                <div class="col-md-6 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" required>
                </div>
                <div class="col-md-12 form-group">
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Tujuan"
                        required></textarea>
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" required>
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Kode Pos" required>
                </div>
                <div class="col-md-12 form-group">
                    <textarea class="form-control" name="catatan" id="catatan"
                        placeholder="Catatan Pengiriman"></textarea>
                </div>
            </form>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Pesanan Anda</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Warna</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                @foreach ($datakeranjang as $item)
                                <tr>
                                    <td>{{$item->namabarang}}</td>
                                    <td>{{$item->warna}}</td>
                                    <td>Rp {{ number_format($item->harga, 2, ",", ".") }}</td>
                                    <td class="text-center">
                                        @if ($item->jumlah >= 10)
                                        40%
                                        @elseif($item->jumlah >= 5)
                                        15%
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="text-center">{{$item->jumlah}}</td>
                                    <td class="text-right">
                                        @php
                                        $subtotal = 0;
                                        $total = 0;
                                        @endphp
                                        @if ($item->jumlah >= 10)
                                        @php
                                        $subtotal = ($item->jumlah * $item->harga) - (0.4 * $item->jumlah *
                                        $item->harga);
                                        @endphp
                                        @elseif($item->jumlah >= 5)
                                        @php
                                        $subtotal = ($item->jumlah * $item->harga) - (0.15 * $item->jumlah *
                                        $item->harga);
                                        @endphp
                                        @else
                                        @php
                                        $subtotal = ($item->jumlah * $item->harga);
                                        @endphp
                                        @endif
                                        Rp {{ number_format($subtotal, 2, ",", ".") }}
                                        @php
                                        $total += $subtotal;
                                        @endphp
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-dark text-light">
                                <tr>
                                    <th class="text-right" colspan="5">Total</th>
                                    <th class="text-right">Rp {{ number_format($total, 2, ",", ".") }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="mb-3 mt-2 btn btn-lg btn-outline-dark btn-block" href="#">Proses Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection