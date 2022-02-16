<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
        return Item::all();
    }

    public function show($id){
        return Item::find($id);
    }

    public function store(Request $request){
        Item::create($request->all());
        return 201;
    }

    public function update(Request $request, $id){
        $item = Item::findOrFail($id);
        $item->update($request->all());

        return 200;
    }

    public function delete($id){
        $item = Item::findOrFail($id);
        $item->delete();

        return 204;
    }
}
