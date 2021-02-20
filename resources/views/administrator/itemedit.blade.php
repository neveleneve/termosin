@extends('template.adminmaster')
@section('title')
<title>Edit Item - Termosin Store</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">
                        Edit Item
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
                        <div class="card-body">
                            <form action="{{route('updateitem')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$dataitem[0]->id}}">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="namaitem">Nama Item</label>
                                        <input class="form-control" type="text" name="namaitem" id="namaitem"
                                            value="{{$dataitem[0]->namaitem}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="harga">Harga Item</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" disabled>
                                                    Rp.
                                                </button>
                                            </div>
                                            <input class="form-control" type="number" name="harga" id="harga"
                                                value="{{$dataitem[0]->harga}}" step="10000">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="diskonstate">Status Diskon</label>
                                        <select class="form-control" name="diskonstate" id="diskonstate">
                                            <option value="1" {{$dataitem[0]->diskonstate == 1 ? 'selected' : null}}>
                                                Ya
                                            </option>
                                            <option value="0" {{$dataitem[0]->diskonstate == 0 ? 'selected' : null}}>
                                                Tidak
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="namaitem">Diskon</label>
                                        <div class="input-group">
                                            <input class="form-control" min="0" max="100" type="number" name="diskon"
                                                id="diskon" value="{{$dataitem[0]->diskon}}">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" disabled>
                                                    %
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="deskripsi">Deskripsi Item</label>
                                        <textarea required name="deskripsi" id="deskripsi" cols="30" rows="10"
                                            class="form-control">{{Storage::disk('public')->get('deskripsi/'.$dataitem[0]->id.'.txt')}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{route('item')}}"
                                            class="btn btn-sm btn-outline-danger btn-block">Kembali</a>
                                    </div>
                                    <div class="col-6">
                                        <input class="btn btn-sm btn-outline-dark btn-block" type="submit"
                                            value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection