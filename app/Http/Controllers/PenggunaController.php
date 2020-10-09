<?php

namespace App\Http\Controllers;

use App\Master_Transaksi;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PenggunaController extends Controller
{
    public function submitkeranjang(Request $req)
    {
        if ($req->has('_token')) {
            dd($req->all());
        } else {
            echo 'error';
        }
    }
}
