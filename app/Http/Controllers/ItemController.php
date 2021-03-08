<?php

namespace App\Http\Controllers;

use App\Item;
use App\Item_Image;
use App\ItemColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $allproduct = Item::get();
        $images = Item_Image::all();
        return view('index', [
            'allproduct' => $allproduct,
            'image' => $images
        ]);
    }

    public function show($id)
    {
        $images = Item_Image::where('id_item', $id)->get();
        $item = Item::where('id', $id)->get();
        $datawarna = ItemColor::where('id_item', $id)->get();
        return view('item', [
            'images' => $images,
            'dataitem' => $item,
            'datawarna' => $datawarna
        ]);
    }
}
