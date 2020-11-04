@extends('template.master')
@section('title')
<title>Cek Pembelian - Termosin Store</title>
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
                        <h2>Cek Pembelian</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
$no = 1;
$idtrxx = null;
$count = null;
$totalan = null;
if (session('idtrx')) {
$idtrxx = session('idtrx');
$datatrx = session('datatrx');
$count = session('jumlahdatatrx');
}else {
$idtrxx = '';
}
@endphp
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="/cek-pembelian" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="notrx" placeholder="Cari Nomor Transaksi"
                            value="{{$idtrxx}}">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <br>
        @if (session('datamaster'))
        <div class="row border">
            <div class="col-12 pb-3">
                <h2 class="text-center mt-3 text-dark">Detail Pengiriman</h2>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>&nbsp&nbsp:</td>
                            <td>&nbsp&nbsp{{session('datamaster')[0]->nama}}</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td>Total Belanja</td>
                            <td>&nbsp&nbsp:</td>
                            <td class="text-right">&nbsp&nbspRp.
                                {{ number_format(session('datamaster')[0]->total, 0, ',','.') }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>&nbsp&nbsp:</td>
                            <td>&nbsp&nbsp{{session('datamaster')[0]->alamat}}</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td>Kode Unik Belanja</td>
                            <td>&nbsp&nbsp:</td>
                            <td class="text-right">&nbsp&nbspRp.
                                {{ number_format(session('datamaster')[0]->kode, 0, ',','.') }}</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>&nbsp&nbsp:</td>
                            <td>&nbsp&nbsp{{session('dataprov')[0]->nama_prov}}</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td>Total Bayar</td>
                            <td>&nbsp&nbsp:</td>
                            <td class="text-right">
                                &nbsp&nbspRp.
                                {{ number_format(session('datamaster')[0]->total + session('datamaster')[0]->kode, 0, ',','.') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Kota</td>
                            <td>&nbsp&nbsp:</td>
                            <td>&nbsp&nbsp{{session('datamaster')[0]->kota}}</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td>Status Pembayaran</td>
                            <td>&nbsp&nbsp:</td>
                            <td class="text-right">
                                &nbsp&nbsp
                                @if (session('datamaster')[0]->status == 0)
                                Belum Dibayar
                                @elseif(session('datamaster')[0]->status == 1)
                                Sudah Dibayar
                                @elseif(session('datamaster')[0]->status == 2)
                                Proses
                                @elseif(session('datamaster')[0]->status == 3)
                                Transaksi Selesai
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Kode Pos</td>
                            <td>&nbsp&nbsp:</td>
                            <td>&nbsp&nbsp{{session('datamaster')[0]->kodepos}}</td>
                        </tr>
                        <tr>
                            <td>Kontak</td>
                            <td>&nbsp&nbsp:</td>
                            <td>&nbsp&nbsp{{session('datamaster')[0]->nohp}}</td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>&nbsp&nbsp:</td>
                            <td>&nbsp&nbsp{{session('datamaster')[0]->catatan}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-3 text-dark">Detail Belanja</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Warna</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>Status</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark text-light">
                        @for ($i = 0; $i < $count; $i++) 
                        <?php
                            $totalan += $datatrx[$i]->total;
                        ?>
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$datatrx[$i]->namaitem}}</td>
                            <td>{{$datatrx[$i]->warna}}</td>
                            <td>Rp. {{number_format($datatrx[$i]->harga, 0, ',', '.')}}</td>
                            <td>{{$datatrx[$i]->jumlah}}</td>
                            <td>
                                @if ($datatrx[$i]->jumlah >= 10)
                                40 %
                                @elseif($datatrx[$i]->jumlah >= 5)
                                15 %
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if ($datatrx[$i]->status == 0)
                                Belum Dibayar
                                @elseif($datatrx[$i]->status == 1)
                                Sudah Dibayar
                                @elseif($datatrx[$i]->status == 2)
                                Dikemas
                                @elseif($datatrx[$i]->status == 3)
                                Sedang Dikirim
                                @elseif($datatrx[$i]->status == 4)
                                Selesai
                                @endif
                            </td>
                            <td class="text-right">Rp. {{number_format($datatrx[$i]->total, 0, ',', '.')}}</td>
                        </tr>                        
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" class="text-right">
                                Jumlah
                            </td>
                            <td class="text-right">
                                Rp. {{number_format($totalan, 0, ',', '.')}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection