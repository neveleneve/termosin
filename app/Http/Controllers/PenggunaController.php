<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function submitdatabelanja(Request $req)
    {
        $request = new Request([
            'jumlah' => $req->jumlah,
            'warna' => $req->warna,
            'ipadd' => $req->ip(),
            'id' => $req->id

        ]);
        dd($request->all());
    }
}
