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
                'harga' => $req->harga,
                'status' => '0'
            ]);
            Keranjang::create($datakeranjang->all());
            return redirect('/keranjang');
        } else {
        }
    }

    public function keranjang(Request $req)
    {
        $datakeranjang = DB::select(
            'select k.id as id, b.namaitem as namabarang, b.img as images, c.warna as warna, k.jumlah as jumlah, k.harga as harga
            from keranjang as k
            join item as b on k.id_item = b.id
            join item_color as c on k.id_item_color = c.id
            where k.ipaddress = "' . $req->ip() . '" and k.status = "0"'
        );
        return view('keranjang', [
            'datakeranjang' => $datakeranjang
        ]);
    }

    public function hapuskeranjang($id)
    {
        Keranjang::where('id', $id)->delete();
        return redirect('/keranjang');
    }

    public function proseskeranjang(Request $req)
    {
        $jumlahkeranjang = count($req->idkrj);
        for ($i = 0; $i < $jumlahkeranjang; $i++) {
            Keranjang::where('id', $req->idkrj[$i])->update([
                'jumlah' => $req->jumlah[$i]
            ]);
        }
        return redirect('/checkout');
    }

    public function checkout(Request $req)
    {
        $datakeranjang = DB::select(
            'select k.id as id, b.namaitem as namabarang, c.warna as warna, k.jumlah as jumlah, k.harga as harga
                from keranjang as k
                join item as b on k.id_item = b.id
                join item_color as c on k.id_item_color = c.id
                where k.ipaddress = "' . $req->ip() . '" and k.status = "0"'
        );
        $random = substr(str_shuffle("0123456789"), 0, 2);
        if (count($datakeranjang) > 0) {
            return view('checkout', [
                'datakeranjang' => $datakeranjang,
                'unique' => $random
            ]);
        }else {
            return redirect('/keranjang');
        }
    }

    public function transaction(Request $req)
    {
        if($req->nama == null || $req->nohp == null || $req->alamat == null || $req->kota == null || $req->kodepos == null || $req->catatan == null) {
            return redirect('/checkout')->with('pemberitahuan', 'Data anda belum lengkap. Silahkan lengkapi data anda!')->with('warna', 'warning');
        } else {
            return redirect('cek-pembelian');
        }
    }

    public function cekpembelian(Request $req)
    {
        if (empty($req->all())) {
            return view('cekpembelian');
        }else {
            echo csrf_token();
            echo 'jajang';
        }
    }
}
