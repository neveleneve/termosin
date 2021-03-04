@extends('template.adminmaster')
@section('title')
    <title>Tambah Item - Termosin Store</title>
@endsection

@section('customjs')
    <script>
        updateList = function() {
            var input = document.getElementById('files');
            var output = document.getElementById('fileList');
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {
                children += '<li>' + input.files.item(i).name + '</li>';
            }
            output.innerHTML = '<ul>' + children + '</ul>';
        }

    </script>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">
                            Tambah Item
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card">
                            <form role="form" action="{{ route('addingitem') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="nama">Nama Item</label>
                                            <input type="text" class="form-control" placeholder="Nama Item">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="harga">Harga</label>
                                            <input type="number" class="form-control" placeholder="Harga">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label for="diskonstate">Diskon</label>
                                            <select class="form-control" name="diskonstate" id="diskonstate">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="diskon">Total Diskon</label>
                                            <input class="form-control" type="text" name="diskon" id="diskon"
                                                placeholder="Diskon">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="files">Gambar Item</label>
                                        <input class="form-control" type="file" name="files[]" id="files"
                                            onchange="updateList()" accept="image/x-png,image/gif,image/jpeg" multiple>
                                    </div>
                                    <p>Selected files:</p>
                                    <div id="fileList"></div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-danger btn-block"
                                                href="{{ url('/administrator/item') }}">Kembali</a>
                                        </div>
                                        <div class="col-6">
                                            <input class="btn btn-sm btn-primary btn-block" type="submit"
                                                value="Tambah Item">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
