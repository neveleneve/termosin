@extends('template.adminmaster')
@section('title')
    <title>Transaction - Termosin Store</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Transaksi</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-nowrap">
                                <thead class="bg-dark text-center">
                                    <tr>
                                        <td>No.</td>
                                        <td>No. Transaksi</td>
                                        <td>Nama Pembeli</td>
                                        <td>Total Pembelian</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->id_trx }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('viewtransaction', ['id' => $item->id]) }}">
                                                    Detail Pembelian
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
