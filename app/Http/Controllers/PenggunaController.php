<?php

namespace App\Http\Controllers;

use App\Keranjang;
use Illuminate\Http\Request;

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
        $datakeranjang = Keranjang::with('')->where('ipaddress', $req->ip())->get();
        return view('keranjang', [
            'datakeranjang' => $datakeranjang
        ]);
    }
}
