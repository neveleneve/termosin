<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\Item;
use App\Item_Image;
use App\ItemColor;
use App\Keranjang;
use App\Master_Transaksi;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function loggedout()
    {
        return redirect(route('login'));
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect(route('login'));
    }

    public function logging_in(Request $request)
    {
        $cekdata =  Administrator::where('username', $request->username)->get();

        if (count($cekdata) > 0) {
            $inputpass = trim($request->password);
            $pass = trim($cekdata[0]['password']);
            if (Hash::check($inputpass, $pass)) {
                Auth::guard('admin')->loginUsingId($cekdata[0]['id']);
                return redirect('/administrator');
            } else {
                return redirect(route('login'))->with('info', 'Username/password tidak ditemukan! Silahkan coba lagi!');
            }
        } else {
            return redirect(route('login'))->with('info', 'Username/password tidak ditemukan! Silahkan coba lagi!');
        }
    }

    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('administrator');
        } else {
            return view('login');
        }
    }

    public function index()
    {
        return view('administrator.dashboard');
    }

    public function item()
    {
        $item = Item::paginate(5);
        return view('administrator.item', [
            'dataitem' => $item
        ]);
    }
    public function viewitem($id)
    {
        $dataitem = Item::where('id', $id)->get();
        if (count($dataitem) == 0) {
            return redirect(route('item'))->with('alert', 'Kesalahan!')->with('status', 'Data dengan ID ' . $id . ' tidak ditemukan!')->with('warna', 'danger');
        } else {
            return view('administrator.itemedit', [
                'dataitem' => $dataitem
            ]);
        }
    }
    public function updateitem(Request $request)
    {
        $diskon = 0;
        if ($request->diskonstate == 0) {
            $diskon = 0;
        } else {
            if ($request->diskon == 0) {
                $diskon = 10;
            } else {
                $diskon = $request->diskon;
            }
        }
        Item::where('id', $request->id)->update([
            'namaitem' => $request->namaitem,
            'harga' => $request->harga,
            'diskonstate' => $request->diskonstate,
            'diskon' => $diskon
        ]);
        Storage::disk('public')->delete('deskripsi/' . $request->code . '.txt');
        Storage::disk('public')->put('deskripsi/' . $request->code . '.txt', $request->deskripsi);

        return redirect(route('item'));
    }

    public function hapusitem($id)
    {
        $cekstatus = Item::where('code', $id)->get();
        if ($cekstatus[0]['status'] == 0) {
            Item::where('code', $id)->update([
                'status' => 1
            ]);
            return redirect(route('item'))->with('alert', 'Data berhasil diaktifkan kembali!')->with('warna', 'success');
        } else {
            Item::where('code', $id)->update([
                'status' => 0
            ]);
            return redirect(route('item'))->with('alert', 'Data berhasil di-non-aktifkan!')->with('warna', 'success');
        }
    }

    public function hapuswarna($id)
    {
        $cekwarnatransaksi = Transaksi::where('id_warna', $id)->count();
        $cekwarnawishlist = Keranjang::where('id_item_color', $id)->count();
        $data = ItemColor::where('id', $id)->get();
        if ($cekwarnawishlist == 0 && $cekwarnatransaksi == 0) {
            ItemColor::where('id', $id)->delete();
            return redirect(route('warnaitem',  ['id' => $data[0]->code_item]))->with('alert', 'Data warna item berhasil dihapus!')->with('warna', 'success');
        } else {
            return redirect(route('warnaitem',  ['id' => $data[0]->code_item]))->with('alert', 'Data warna item tidak dapat dihapus karena sudah berada di keranjang dan/atau transaksi')->with('warna', 'danger');
        }
    }

    public function addingitemwarna(Request $request)
    {
        $datawarna = ItemColor::where([
            'code_item' => $request->code_item,
            'warna' => $request->warna,
        ])->get();
        if (count($datawarna) == 0) {
            ItemColor::insert([
                'code_item' => $request->code_item,
                'warna' => $request->warna,
            ]);
            return redirect(route('warnaitem',  ['id' => $request->code_item]))->with('alert', 'Data warna item berhasil ditambah!')->with('warna', 'success');
        } else {
            return redirect(route('warnaitem',  ['id' => $request->code_item]))->with('alert', 'Warna item sudah ada! Silahkan ulangi!')->with('warna', 'danger');
        }
    }

    public function itemwarna($id)
    {
        $dataitem = Item::where('code', $id)->get();
        $datawarna = ItemColor::where('code_item', $id)->get();
        return view('administrator.itemcolor', [
            'dataitem' => $dataitem,
            'datawarna' => $datawarna
        ]);
    }
    public function itemimage($id)
    {
        $item = Item_Image::where('code_item', $id)->get();
        return view('administrator.itemimage', [
            'data' => $item,
        ]);
    }
    private function item_code()
    {
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        return $randomString;
    }
    public function additem()
    {
        return view('administrator.itemadd');
    }

    private function tambahDataItem($data)
    {
        Item::insert([
            $data
        ]);
    }

    public function hapusitemimage($id)
    {
        Item_Image::where('image', $id)->delete();
        Storage::disk('public')->delete('item/' . $id);
        $iditem = substr($id, 0, 10);
        return redirect(route('imageitem', ['id' => $iditem]));
    }

    public function additemimage(Request $data)
    {
        $this->tambahDataImage($data, $data->id, 'images');
        return redirect(route('imageitem', ['id' => $data->id]));
    }

    private function tambahDataImage($dataimg, $code, $name)
    {
        $totalimage = count($dataimg->file($name));
        for ($i = 0; $i < $totalimage; $i++) {
            Item_Image::create([
                'code_item' => $code,
                'image' => $code . '-' . $i . '.png'
            ]);
            Storage::putFileAs('public/item', $dataimg->file($name)[$i], $code . '-' . $i . '.png');
        }
    }

    private function addDescription($code, $data)
    {
        Storage::disk('public')->put('deskripsi/' . $code . '.txt', $data->deskripsi);
    }

    private function addColor($color, $code)
    {
        $daftarwarna = explode(',', $color);
        for ($i = 0; $i < count($daftarwarna); $i++) {
            ItemColor::create([
                'code_item' => $code,
                'warna' => $daftarwarna[$i],
            ]);
        }
    }

    public function addingitem(Request $data)
    {
        // dd($data->file('files')[0]->getClientOriginalName());
        $itemcode = $this->item_code();
        if (($data->diskonstate == 1 && $data->diskon == 0) || ($data->diskonstate == 1 && $data->diskon == null)) {
            $diskon = "10";
        } else {
            $diskon = $data->diskon;
        }
        $dataitem = [
            'code' => $itemcode,
            'namaitem' => $data->nama,
            'harga' => $data->harga,
            'diskonstate' => $data->diskonstate,
            'diskon' => $diskon,
            'img' => $itemcode . '-0.png',
        ];
        // Add data to item table
        $this->tambahDataItem($dataitem);
        // Add data to item color table
        $this->addColor($data->warna, $itemcode);
        // Add image data to table and folder
        $this->tambahDataImage($data, $itemcode, 'files');
        // Add description .txt to folder
        $this->addDescription($itemcode, $data);
        return redirect(route('item'));
    }

    public function transaction()
    {
        $mastertransaksi = Master_Transaksi::get();
        $trx = Transaksi::all();
        return view('administrator.transaction', [
            'data' => $mastertransaksi,
            'trx' => $mastertransaksi
        ]);
    }
    public function admin()
    {
        return view('administrator.admin');
    }
}
