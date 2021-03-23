@extends('template.adminmaster')
@section('title')
    <title>Item - Termosin Store</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">
                            Item
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-12">
                        <a class="btn btn-outline-dark btn-block" href="{{ route('additem') }}">Add Item</a>
                    </div>
                </div>
                @if (session('alert'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-{{ session('warna') }} alert-dismissible fade show text-center">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ session('alert') }}</strong> {{ session('status') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-nowrap">
                                <thead class="bg-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Status Diskon</th>
                                        <th>Diskon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody class="text-center">
                                    @foreach ($dataitem as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->namaitem }}</td>
                                            <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($item->diskonstate == 0)
                                                    Tidak
                                                @else
                                                    Ya
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->diskon == 0)
                                                    -
                                                @else
                                                    {{ $item->diskon }}%
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm bg-olive"
                                                    href="{{ route('viewitem', ['id' => $item->id]) }}">
                                                    Edit
                                                </a>
                                                <a class="btn btn-sm bg-navy"
                                                    href="{{ route('imageitem', ['id' => $item->code]) }}">
                                                    Gambar
                                                </a>
                                                <a class="btn btn-sm bg-gray-dark"
                                                    href="{{ route('warnaitem', ['id' => $item->code]) }}">
                                                    Warna
                                                </a>
                                                @if ($item->status == 0)
                                                    <a class="btn btn-sm bg-olive" onclick="return confirm('Aktifkan item kembali?')"
                                                        href="{{ route('statusitem', ['id' => $item->code]) }}">
                                                        Aktifkan
                                                    </a>
                                                    @else
                                                    <a class="btn btn-sm bg-maroon" onclick="return confirm('Non-Aktifkan item?')"
                                                        href="{{ route('statusitem', ['id' => $item->code]) }}">
                                                        Non-Aktifkan
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {!! $dataitem->render('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
