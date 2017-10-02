<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class listController extends Controller
{
    public function index(){
        $items = Item::all();
        return view('list',compact('items'));
    }

    public function create(request $request){
        $item = new Item;
        $item->item = $request->text;
        $item->save();
        return 'Done';
    }
}
