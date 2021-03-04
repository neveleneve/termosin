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
                        <a class="btn btn-outline-danger btn-block" href="{{ route('item') }}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @for ($i = 0; $i < $data[0]->img_qty; $i++)
                        <div class="col-lg-3 col-md-4 col-6 mb-3">
                            <img class="img-fluid img-thumbnail mb-2"
                                src="{{ asset('storage/item/' . $data[0]->id . '-' . $i . '.png') }}" alt="">
                            <a class="btn btn-sm bg-navy btn-block" target="_blank"
                                href="{{ url('storage/item/' . $data[0]->id . '-' . $i . '.png') }}">
                                View Image
                            </a>
                            <a class="btn btn-sm bg-maroon btn-block" href="" onclick="return confirm('Hapus gambar ini?')">
                                Delete Image
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
@endsection
