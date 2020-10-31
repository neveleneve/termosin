<?php

namespace App\Http\Controllers;

use App\Keranjang;
use App\Master_Transaksi;
use App\Provinsi;
use App\Transaksi;
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
        $datakeranjang = DB::select('select k.id as id,
                b.namaitem as namabarang,
                c.warna as warna,
                k.jumlah as jumlah,
                k.harga as harga
            from keranjang as k
            join item as b on k.id_item = b.id
            join item_color as c on k.id_item_color = c.id
            where k.ipaddress = "' . $req->ip() . '" and k.status = "0"');
        $random = substr(str_shuffle("0123456789"), 0, 2);
        $dataprov = Provinsi::get();
        if (count($datakeranjang) > 0) {
            return view('checkout', [
                'datakeranjang' => $datakeranjang,
                'unique' => $random,
                'provinsi' => $dataprov
            ]);
        } else {
            return redirect('/keranjang');
        }
    }

    public function transaction(Request $req)
    {
        if ($req->nama == null || $req->nohp == null || $req->alamat == null || $req->kota == null || $req->kodepos == null || $req->provinsi == null) {
            return redirect('/checkout')->with('pemberitahuan', 'Data anda belum lengkap. Silahkan lengkapi data anda!')->with('warna', 'warning');
        } else {
            $kodetransaksi = null;
            $random = substr(str_shuffle("0123456789"), 0, 5);
            $datamaster = DB::select("select max(right(id_trx, 5)) as idtransaksi from master_transaksi");
            if ($datamaster[0]->idtransaksi == null) {
                $kodetransaksi = 'T' . $random . '00001';
            } else {
                $dataterakhir = $datamaster[0]->idtransaksi;
                $panjangdata = strlen($dataterakhir);
                $kodebaru = $dataterakhir + 1;
                $panjangkodebaru = strlen($kodebaru);
                for ($i = 0; $i < $panjangdata - $panjangkodebaru; $i++) {
                    $kodebaru = '0' . $kodebaru;
                }
                $kodetransaksi = 'T' . $random . $kodebaru;
            }
            $email = null;
            $catatan = null;
            if ($req->catatan == null &&  $req->email == null) {
                $email = '-';
                $catatan = '-';
            } elseif ($req->catatan == null) {
                $catatan = '-';
                $email = $req->email;
            } elseif ($req->email == null) {
                $email = '-';
                $catatan = $req->catatan;
            } else {
                $email = $req->email;
                $catatan = $req->catatan;
            }

            $datakeranjang = Keranjang::where('ipaddress', $req->ip())->get();
            $jumlahdatakeranjang = Keranjang::where('ipaddress', $req->ip())->count();

            // dd($req->all());
            for ($i = 0; $i < $jumlahdatakeranjang; $i++) {
                $jumlahbarang = $datakeranjang[$i]->jumlah;
                $idbarang = $datakeranjang[$i]->id_item;
                $idwarna = $datakeranjang[$i]->id_item_color;
                $harga = $datakeranjang[$i]->harga;
                if ($jumlahbarang >= 10) {
                    $total = ($harga * $jumlahbarang) - ((40 / 100) *  $harga * $jumlahbarang);
                } elseif ($jumlahbarang >= 5) {
                    $total = ($harga * $jumlahbarang) - ((15 / 100) *  $harga * $jumlahbarang);
                } else {
                    $total = ($harga * $jumlahbarang);
                }
                echo 'ID : ' . $idbarang . ' ';
                echo 'Jumlah : ' . $jumlahbarang . ' ';
                echo 'Warna : ' . $idwarna . ' ';
                echo 'Harga : ' . $harga . ' ';
                echo 'Total : ' . $total . ' ';
                echo '<br>';
                // Transaksi::create([

                // ]);
            }
            // $ubahdatakeranjang = Keranjang::where('ipaddress', $req->ip())->update();
            // Master_Transaksi::create([
            //     'id_trx' => $kodetransaksi,
            //     'id_pengguna' => $req->ip(),
            //     'email' => $email,
            //     'nama' => $req->nama,
            //     'alamat' => $req->alamat,
            //     'provinsi' => $req->provinsi,
            //     'kota' => $req->kota,
            //     'kodepos' => $req->kodepos,
            //     'nohp' => $req->nohp,
            //     'catatan' => $catatan,
            //     'total' => $req->total,
            //     'status' => 0,
            //     'kode' => $req->kode
            // ]);
            // return redirect('/cek-pembelian')->with('idtrx', $kodetransaksi);
        }
    }

    public function cekpembelian(Request $req)
    {
        if (empty($req->all())) {
            return view('cekpembelian');
        } else {
            echo csrf_token();
            echo 'jajang';
        }
    }
}
