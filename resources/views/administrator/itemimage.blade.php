@extends('template.adminmaster')
@section('title')
    <title>Item's Image - Termosin Store</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">
                            Item's Images
                        </h1>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-1">
                        <a class="btn btn-sm btn-outline-danger btn-block" href="{{ route('item') }}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <div class="col-11">
                        <a class="btn btn-sm btn-outline-primary btn-block" href="#" data-toggle="modal"
                            data-target="#modaladdimage">Tambah Gambar</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @for ($i = 0; $i < count($data); $i++)
                        <div class="col-lg-3 col-md-4 col-6 mb-3">
                            <img class="img-fluid img-thumbnail mb-2"
                                src="{{ asset('storage/item/' . $data[$i]->image) }}" alt="">
                            <a class="btn btn-sm bg-navy btn-block" target="_blank"
                                href="{{ asset('storage//item/' . $data[$i]->image) }}">
                                View Image
                            </a>
                            <a class="btn btn-sm bg-maroon btn-block"
                                href="{{ route('hapusimageitem', ['id' => $data[$i]->image]) }}"
                                onclick="return confirm('Hapus gambar ini?')">
                                Delete Image
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="modaladdimage">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Gambar</h4>
                </div>
                <form role="form" action="{{ route('addimageitem') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $data[0]->code_item }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="file" name="images[]" id="images"
                                    accept="image/x-png,image/gif,image/jpeg" onchange="updateList()" multiple required>
                                <p>Selected files:</p>
                                <div id="fileList"></div>
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
@section('customjs')
    <script>
        updateList = function() {
            var input = document.getElementById('images');
            var output = document.getElementById('fileList');
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {
                children += '<li>' + input.files.item(i).name + '</li>';
            }
            output.innerHTML = '<ul>' + children + '</ul>';
        }

    </script>
@endsection
