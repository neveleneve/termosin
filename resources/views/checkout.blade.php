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
                                        $totalan = $total + $unique;
                                        @endphp
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-light">
                                <tr class="bg-danger">
                                    <th class="text-right" colspan="5">Kode Unik</th>
                                    <th class="text-right">Rp {{ number_format($unique, 2, ",", ".") }}</th>
                                </tr>
                                <tr class="bg-dark ">
                                    <th class="text-right" colspan="5">Total</th>
                                    <th class="text-right">Rp {{ number_format($totalan, 2, ",", ".") }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center pb-3 mb-3 border-bottom border-dark">Detail Pengiriman</h3>
            @if (session('pemberitahuan'))
            <div class="alert bg-{{session('warna')}} alert-dismissable text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{session('pemberitahuan')}}
            </div>
            @endif
            <div class="form-group">
                <input type="text" class="form-control" id="inputnama" name="inputnama" oninput="transaction('nama')"
                    placeholder="Nama Lengkap" title="Wajib Diisi" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">+62</span>
                </div>
                <input type="number" class="form-control" placeholder="Nomor Handphone" id="inputnohp" name="inputhohp"
                    oninput="transaction('nohp')" title="Wajib Diisi">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="inputemail" name="inputemail"
                    oninput="transaction('email')" placeholder="E-Mail">
            </div>
            <div class="form-group">
                <select class="form-control" id="inputprovinsi" name="inputprovinsi" id="provinsi"
                    onchange="transaction('provinsi')">
                    <option disabled selected>Pilih Provinsi</option>
                    @foreach ($provinsi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_prov }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputkota" name="inputkota" oninput="transaction('kota')"
                    placeholder="Kota" title="Wajib Diisi" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="inputalamat" id="inputalamat" oninput="transaction('alamat')"
                    placeholder="Alamat Tujuan" title="Wajib Diisi" required></textarea>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="inputkodepos" name="inputkodepos"
                    oninput="transaction('kodepos')" placeholder="Kode Pos" title="Wajib Diisi" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="inputcatatan" id="inputcatatan" oninput="transaction('catatan')"
                    placeholder="Catatan Pengiriman"></textarea>
            </div>
            <button class="mb-3 mt-2 btn btn-lg btn-outline-dark btn-block" href="#" data-toggle="modal"
                data-target="#modalbayar">
                Pilih Metode Pembayaran
            </button>
        </div>
    </div>
    <div class="modal fade" id="modalbayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pilihan Metode Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="listbank">
                        {{-- Bank BNI Selesai --}}
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
                            <div id="bankbni" class="collapse" aria-labelledby="headingOne" data-parent="#listbank">
                                <div class="card-body">
                                    {{-- Cara Pembayaran --}}
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#bniibanking">BNI Internet Banking</button>
                                    <div id="bniibanking" class="collapse">
                                        <p>
                                            1. Login di halaman <strong>
                                                <a class="text-dark" href="//ibank.bni.co.id">
                                                    ibank.bni.co.id
                                                </a>
                                            </strong>
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                TRANSACTION > VIRTUAL ACCOUNT BILLING
                                            </strong>
                                        </p>
                                        <p>
                                            3. Masukkan
                                            <strong class="text-dark">
                                                8810 0822 8378 4873
                                            </strong>
                                            , pilih jenis tabungan Anda, lalu pilih lanjut
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan anda
                                        </p>
                                        <p>
                                            5. Pada halaman konfirmasi, masukkan token autentifikasi untuk menyelesaikan
                                            transaksi anda
                                        </p>
                                    </div>
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#bnimbanking">BNI Mobile Banking</button>
                                    <div id="bnimbanking" class="collapse">
                                        <p>
                                            1. Login di halaman
                                            <strong class="text-dark">
                                                BNI Mobile Banking App
                                            </strong>
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                TRANSACTION > VIRTUAL ACCOUNT BILLING
                                            </strong>
                                        </p>
                                        <p>
                                            3. Pilih tab 'Input Baru', lalu masukkan
                                            <strong class="text-dark">
                                                8810 0822 8378 4873
                                            </strong>
                                            pada nomor rekening tujuan, lalu pilih lanjut
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan Anda
                                        </p>
                                        <p>
                                            5. Pada halaman konfirmasi, masukkan token autentifikasi untuk menyelesaikan
                                            transaksi Anda
                                        </p>
                                    </div>
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#bniatm">ATM BNI</button>
                                    <div id="bniatm" class="collapse">
                                        <p>
                                            1. Masukkan kartu Anda, pilih bahasa, lalu masukkan pin Anda
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                OTHER MENU > TRANSFER > FROM SAVING ACCOUNT > VIRTUAL ACCOUNT BILLING
                                            </strong>
                                        </p>
                                        <p>
                                            3. Masukkan
                                            <strong class="text-dark">
                                                8810 0822 8378 4873
                                            </strong>
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan Anda
                                        </p>
                                        <p>
                                            5. Konfirmasi pembayaran Anda
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Bank BRI --}}
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#bankbri"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <i>
                                    <img class="img-fluid"
                                        src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BRI-32.png">
                                </i>
                                <span class="font-weight-bold">
                                    Bank BRI
                                </span>
                            </div>
                            <div id="bankbri" class="collapse" aria-labelledby="headingTwo" data-parent="#listbank">
                                <div class="card-body">
                                    {{-- Cara Pembayaran --}}
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#briibanking">Internet Banking BRI (Web)</button>
                                    <div id="briibanking" class="collapse">
                                        <p>
                                            1. Login di halaman <strong>
                                                <a class="text-dark" href="//ib.bri.co.id">
                                                    ib.bri.co.id
                                                </a>
                                            </strong>.
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                PEMBAYARAN > BRIVA
                                            </strong>.
                                        </p>
                                        <p>
                                            3. Masukkan
                                            <strong class="text-dark">
                                                8881 0 0822 8378 4873
                                            </strong>
                                            didalam <strong class="text-dark">"Kode Bayar"</strong>,
                                            lalu pilih <strong class="text-dark">"Kirim"</strong>.
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan anda, lalu pilih <strong class="text-dark">"Kirim"</strong>.
                                            Jika Nomor Akun Virtual Benar, informasi transaksi akan muncul.
                                        </p>
                                        <p>
                                            5. Konfirmasi transaksi dengan mengisi password anda dan memilih
                                            <strong class="text-dark">"Permintaan mToken"</strong> untuk mendapatkan
                                            mToken yang dikirimkan ke ponsel anda, lalu input ke kolom mToken, lalu
                                            pilih <strong class="text-dark">"Kirim"</strong>
                                        </p>
                                    </div>
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#brimbanking">Internet Banking BRI (Mobile)</button>
                                    <div id="brimbanking" class="collapse">
                                        <p>
                                            1. Buka Aplikasi BRI Mobile dan masuk ke
                                            <strong class="text-dark">
                                                Internet Banking BRI
                                            </strong>.
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                PEMBAYARAN > BRIVA
                                            </strong>.
                                        </p>
                                        <p>
                                            3. Pilih 'Kode Bayar', lalu masukkan
                                            <strong class="text-dark">
                                                8810 0822 8378 4873
                                            </strong>
                                            pada <strong class="text-dark">Nomor BRIVA</strong>, lalu pilih <strong class="text-dark">OK</strong>.
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan Anda, lalu pilih <strong class="text-dark">Kirim</strong> .
                                        </p>
                                        <p>
                                            5. Konfirmasi pembayaran dengan memasukkan kata sandi internet banking anda, 
                                            Lalu pilih <strong class="text-dark">Kirim</strong>.
                                        </p>
                                    </div>
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#mbankingbri">Mobile Banking BRI</button>
                                    <div id="mbankingbri" class="collapse">
                                        <p>
                                            1. Masukkan kartu Anda, pilih bahasa, lalu masukkan pin Anda.
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                OTHER MENU > TRANSFER > FROM SAVING ACCOUNT > VIRTUAL ACCOUNT BILLING
                                            </strong>.
                                        </p>
                                        <p>
                                            3. Masukkan
                                            <strong class="text-dark">
                                                8810 0822 8378 4873
                                            </strong>.
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan Anda.
                                        </p>
                                        <p>
                                            5. Konfirmasi pembayaran Anda.
                                        </p>
                                    </div>
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#atmbri">ATM BRI</button>
                                    <div id="atmbri" class="collapse">
                                        <p>
                                            1. Masukkan kartu Anda, pilih bahasa, lalu masukkan pin Anda.
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                OTHER MENU > TRANSFER > FROM SAVING ACCOUNT > VIRTUAL ACCOUNT BILLING
                                            </strong>.
                                        </p>
                                        <p>
                                            3. Masukkan
                                            <strong class="text-dark">
                                                8810 0822 8378 4873
                                            </strong>.
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan Anda.
                                        </p>
                                        <p>
                                            5. Konfirmasi pembayaran Anda.
                                        </p>
                                    </div>
                                    <button class="mb-2 btn btn-outline-dark btn-block" data-toggle="collapse"
                                        data-target="#miniatmbri">Mini ATM BRI</button>
                                    <div id="miniatmbri" class="collapse">
                                        <p>
                                            1. Masukkan kartu Anda, pilih bahasa, lalu masukkan pin Anda.
                                        </p>
                                        <p>
                                            2. Pilih
                                            <strong class="text-dark">
                                                OTHER MENU > TRANSFER > FROM SAVING ACCOUNT > VIRTUAL ACCOUNT BILLING
                                            </strong>.
                                        </p>
                                        <p>
                                            3. Masukkan
                                            <strong class="text-dark">
                                                8810 0822 8378 4873
                                            </strong>.
                                        </p>
                                        <p>
                                            4. Masukkan <strong class="text-dark">{{$totalan}}</strong> ke dalam kolom
                                            tagihan Anda.
                                        </p>
                                        <p>
                                            5. Konfirmasi pembayaran Anda.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bank Mandiri --}}
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#bankmandiri"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <i>
                                    <img class="img-fluid"
                                        src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/Mandiri-32.png">
                                </i>
                                <span class="font-weight-bold">
                                    Bank Mandiri
                                </span>
                            </div>
                            <div id="bankmandiri" class="collapse" aria-labelledby="headingTwo" data-parent="#listbank">
                                <div class="card-body">
                                    {{-- Cara Pembayaran --}}
                                </div>
                            </div>
                        </div>
                        {{-- Bank BCA --}}
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#bankbca"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <i>
                                    <img class="img-fluid"
                                        src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BCA-32.png">
                                </i>
                                <span class="font-weight-bold">
                                    Bank BCA
                                </span>
                            </div>
                            <div id="bankbca" class="collapse" aria-labelledby="headingTwo" data-parent="#listbank">
                                <div class="card-body">
                                    {{-- Cara Pembayaran --}}
                                </div>
                            </div>
                        </div>
                        {{-- Dana DOmpet --}}
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#danadompet"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <i>
                                    <img class="img-fluid" width="32px"
                                        src="https://1.bp.blogspot.com/-LDwtS_oxYgg/XO67MmzGN7I/AAAAAAAAADI/hrSqgCRod3oIS6NtwjOqdY0okl8hwyi6gCLcBGAs/s1600/logo%2Bdana%2Bdompet%2Bdigital%2BPNG.png">
                                </i>
                                <span class="font-weight-bold">
                                    Dana Dompet Digital
                                </span>
                            </div>
                            <div id="danadompet" class="collapse" aria-labelledby="headingTwo" data-parent="#listbank">
                                <div class="card-body">
                                    {{-- Cara Pembayaran --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <form action="/transaction" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="total" value="{{$total}}" required>
                        <input type="hidden" name="kode" value="{{$unique}}" required>
                        <input type="hidden" id="outputnama" name="nama" value="" required>
                        <input type="hidden" id="outputnohp" name="nohp" value="" required>
                        <input type="hidden" id="outputemail" name="email" value="">
                        <input type="hidden" id="outputalamat" name="alamat" value="" required>
                        <input type="hidden" id="outputprovinsi" name="provinsi" value="" required>
                        <input type="hidden" id="outputkota" name="kota" value="" required>
                        <input type="hidden" id="outputkodepos" name="kodepos" value="" required>
                        <input type="hidden" id="outputcatatan" name="catatan" value="">
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customjs')
<script src="{{asset('assets/js/custom.js')}}"></script>
@endsection
