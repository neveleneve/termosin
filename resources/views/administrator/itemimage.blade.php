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
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @for ($i = 0; $i < $data[0]->img_qty; $i++)
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <img class="img-fluid img-thumbnail mb-2"
                            src="{{asset('storage/item/'. $data[0]->id.'-'. $i .'.png')}}" alt="">
                        <a class="btn btn-primary btn-block" target="_blank"
                            href="{{url('storage/item/'. $data[0]->id.'-'. $i .'.png')}}">
                            View Image
                        </a>
                        <a class="btn btn-danger btn-block" href="" onclick="return confirm('Hapus gambar ini?')">
                            Delete Image
                        </a>
                    </div>
                    @endfor
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-danger btn-block" href="{{route('item')}}">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection