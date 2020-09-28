<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemColor;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $allproduct = Item::get();
        return view('index', [
            'allproduct' => $allproduct
        ]);
    }

    public function show($id)
    {
        $iditem = $id[0];
        $item = Item::where('id', $iditem)->get();
        $namagambar = str_replace('-0.png', '', $item[0]->img);
        $jumlahgambar = count(glob(public_path('images/item/' . $namagambar . '*.png')));
        $datawarna = ItemColor::where('Id_barang', $iditem)->get();

        return view('item', [
            'dataitem' => $item,
            'jumlah' => $jumlahgambar,
            'namagambar' => $namagambar,
            'datawarna' => $datawarna
        ]);
    }
}
