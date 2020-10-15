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
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center pb-3 mb-3 border-bottom border-dark">Pesanan Anda</h3>
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
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center pb-3 mb-3 border-bottom border-dark">Detail Pengiriman</h3>
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nohp" name="hohp" placeholder="Nomor Handphone"
                        required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Tujuan"
                        required></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Kode Pos" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="catatan" id="catatan"
                        placeholder="Catatan Pengiriman"></textarea>
                </div>
                <button class="mb-3 mt-2 btn btn-lg btn-outline-dark btn-block" href="#" data-toggle="modal"
                    data-target="#modalbayar">
                    Proses Pembayaran
                </button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modalbayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pilihan Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="listbank">
                        <div class="card">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#bankbni"
                                aria-expanded="true" aria-controls="collapseOne">
                                <i>
                                    <img class="img-fluid"
                                        src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BNI-32.png">
                                </i>
                                <span class="font-weight-bold">
                                    Bank BNI
                                </span>
                            </div>
                            <div id="bankbni" class="collapse" aria-labelledby="headingOne"
                                data-parent="#listbank">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#bankbtn"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <i>
                                    <img class="img-fluid"
                                        src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/Bank_BTN-32.png">
                                </i>
                                <span class="font-weight-bold">
                                    Bank BTN
                                </span>
                            </div>
                            <div id="bankbtn" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#listbank">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Proses</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection