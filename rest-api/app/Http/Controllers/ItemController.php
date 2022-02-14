<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
        return Item::all();
    }

    public function store(Request $request){
        Item::create($request->all());
        return 201;
    }
}
