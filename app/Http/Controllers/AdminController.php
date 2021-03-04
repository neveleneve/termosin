<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\Item;
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

        Storage::disk('public')->delete('deskripsi/' . $request->id . '.txt');
        Storage::disk('public')->put('deskripsi/' . $request->id . '.txt', $request->deskripsi);

        return redirect(route('item'));
    }
    public function itemimage($id)
    {
        $item = Item::where('id', $id)->get();
        return view('administrator.itemimage', [
            'data' => $item
        ]);
    }

    public function additem()
    {
        return view('administrator.itemadd');
    }
    public function addingitem(Request $data)
    {
        dd($data->all());
        
    }

    public function transaction()
    {
        return view('administrator.transaction');
    }
    public function admin()
    {
        return view('administrator.admin');
    }
}
