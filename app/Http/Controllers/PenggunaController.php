<?php

namespace App\Http\Controllers;

use App\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function submitkeranjang(Request $req)
    {
        if ($req->has('_token')) {
            $datakeranjang = new Request([
                'ipaddress' => $req->ip(),
                'id_item' => $req->id_barang,
                'id_item_color' => $req->warna,
                'jumlah' => $req->jumlah,
                'harga' => $req->harga
            ]);
            Keranjang::create($datakeranjang->all());
            return redirect('/item/'.$req->id_barang);
        } else {
        
        }
    }

    public function keranjang(Request $req)
    {
        $datakeranjang = DB::select(
            'select b.namaitem as namabarang, b.img as images, c.warna as warna, k.jumlah as jumlah, k.harga as harga
            from keranjang as k 
            join item as b on k.id_item = b.id
            join item_color as c on k.id_item_color = c.id
            where k.ipaddress = '.$req->ip()
        );
        return view('keranjang', [
            'datakeranjang' => $datakeranjang
        ]);
    }
}
