<?php

namespace App\Http\Controllers;

use App\Item;
use App\Keranjang;
use App\Master_Transaksi;
use App\Provinsi;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;


class PenggunaController extends Controller
{
    public function search()
    {
        $dataori = Input::get('cari');
        $sortby = Input::get('sort-by');

        $datasort = str_replace('_', ' ', $sortby);
        $datacari = explode(' ', $dataori);
        $jumlahkata = count($datacari);
        $where = '';
        for ($i = 0; $i < $jumlahkata; $i++) {
            if ($i == 0) {
                $where .= 'WHERE item.namaitem LIKE "%' . $datacari[$i] . '%"';
            } else {
                $where .= ' OR item.namaitem LIKE "%' . $datacari[$i] . '%"';
            }
        }
        // echo $where;
        $contoh = DB::select('SELECT item.*, sum(transaksi.jumlah) as jumlahbeli, (item.harga - (item.harga * item.diskon/100)) as price, item.diskon as diskon
            FROM transaksi
            JOIN item ON transaksi.id_item = item.id
            ' . $where . '
            GROUP BY item.id
            ORDER BY ' . $datasort);

        return view('pencarian', [
            'datacari' => $dataori,
            'datasort' => $sortby,
            'allproduct' => $contoh,
        ]);
    }

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
        $ip = $req->ip();
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

            $datakeranjang = Keranjang::where('ipaddress', $req->ip())->where('status', 0)->get();
            $jumlahdatakeranjang = Keranjang::where('ipaddress', $req->ip())->where('status', 0)->count();
            $totalan = null;

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
                Transaksi::create([
                    'id_transaksi' => $kodetransaksi,
                    'id_item' => $idbarang,
                    'id_warna' => $idwarna,
                    'jumlah' => $jumlahbarang,
                    'total' => $total,
                    'status' => 0
                ]);
                $totalan += $total;
            }
            Keranjang::where('ipaddress', $ip)->where('status', 0)->update([
                'status' => 1
            ]);
            Master_Transaksi::create([
                'id_trx' => $kodetransaksi,
                'id_pengguna' => $req->ip(),
                'email' => $email,
                'nama' => $req->nama,
                'alamat' => $req->alamat,
                'provinsi' => $req->provinsi,
                'kota' => $req->kota,
                'kodepos' => $req->kodepos,
                'nohp' => $req->nohp,
                'catatan' => $catatan,
                'total' => $totalan,
                'status' => 0,
                'kode' => $req->kode
            ]);
            return redirect('/cek-pembelian')->with('idtrx', $kodetransaksi);
        }
    }

    public function cekpembelian()
    {
        return view('cekpembelian');
    }

    public function cekpembeliancari(Request $req)
    {
        $idtrx = $req->notrx;
        $jumlahdatamaster = Master_Transaksi::where('id_trx', $idtrx)->count();
        if ($jumlahdatamaster > 0) {
            $datamaster = Master_Transaksi::where('id_trx', $idtrx)->get();
            $namaprovinsi = Provinsi::where('id', $datamaster[0]->provinsi)->get();
            $datatransaksi = DB::select("SELECT i.namaitem AS namaitem, i.harga AS harga, t.jumlah AS jumlah, c.warna AS warna, t.total AS total, t.status AS status
        FROM transaksi AS t JOIN item AS i ON i.id = t.id_item JOIN item_color AS c ON c.id = t.id_warna WHERE t.id_transaksi = '$idtrx'");
            $jumlahdatatransaksi = Transaksi::where('id_transaksi', $idtrx)->count();
            return redirect('/cek-pembelian')->with('idtrx', $idtrx)->with([
                'dataprov' => $namaprovinsi,
                'datamaster' => $datamaster,
                'datatrx' => $datatransaksi,
                'jumlahdatatrx' => $jumlahdatatransaksi
            ]);
        } else {
            return redirect('/cek-pembelian')->with('datakosong', 'Nomor Transaksi Tidak Terdaftar! Silahkan Ulangi!');
        }
    }
}
