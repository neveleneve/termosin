<?php

namespace App\Http\Controllers;

use App\Master_Transaksi;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PenggunaController extends Controller
{
    public function submitdatabelanja(Request $req)
    {

        $cektransaksi = Master_Transaksi::where('id_pengguna', $req->ip())->count();
        $idtransaksi = null;
        if ($cektransaksi == 0) {
            $idtransaksi = 'TRX'.date('dmY') . '0001';
        } else {
        }

        $total = $req->jumlah * $req->harga;
        $tanggal = date('d-m-Y H:i:s', strtotime('+24 Hours'));
        $requesttransaksi = new Request([
            'jumlah' => $req->jumlah,
            'id_warna' => $req->warna,
            'id_transaksi' => $idtransaksi,
            'id_item' => $req->id,
            'bataswaktu' => $tanggal,
            'total' => $total
        ]);
        $requestmaster = new Request([
            'id' => $idtransaksi,
            'id_pengguna' => $req->ip(),
            'total' => +$total,
            'total_transaksi' => +$req->jumlah
        ]);
        Master_Transaksi::create($requestmaster->all());
        Transaksi::create($requesttransaksi->all());
    }
}
