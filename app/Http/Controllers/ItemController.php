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
        $allproduct = Item::where('status', 1)->get();
        return view('index', [
            'allproduct' => $allproduct
        ]);
    }

    public function show($id)
    {
        $images = Item_Image::where('code_item', $id)->get();
        $item = Item::where('code', $id)->get();
        $datawarna = ItemColor::where('code_item', $id)->get();
        return view('item', [
            'images' => $images,
            'dataitem' => $item,
            'datawarna' => $datawarna
        ]);
    }
}
