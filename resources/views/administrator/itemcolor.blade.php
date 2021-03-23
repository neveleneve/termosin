@extends('template.adminmaster')
@section('title')
    <title>Warna Item - Termosin Store</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">
                            Item {{ $dataitem[0]['namaitem'] }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-1">
                        <a class="btn btn-outline-danger btn-block" href="{{ route('item') }}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <div class="col-11">
                        <a class="btn btn-outline-dark btn-block" href="#" data-toggle="modal"
                            data-target="#modaladdwarna">Tambah Warna</a>
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
                                        <th>Warna</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody class="text-center">
                                    @foreach ($datawarna as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->warna }}</td>
                                            <td>
                                                <a class="btn btn-sm bg-olive"
                                                    href="{{ route('editwarnaitem', ['id' => $item->id]) }}">Edit</a>
                                                <a class="btn btn-sm bg-maroon"
                                                    onclick="return confirm('Hapus warna {{ $item->warna }} pada item ini?')"
                                                    href="{{ route('hapuswarnaitem', ['id' => $item->id]) }}">Hapus</a>
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
    <div class="modal fade" id="modaladdwarna">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Warna</h4>
                </div>
                <form role="form" action="{{ route('addingwarnaitem') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="code_item" value="{{ $dataitem[0]['code'] }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="warna" id="warna"
                                    placeholder="Input Warna Item...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
