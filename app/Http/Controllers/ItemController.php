<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $items = Item::orderBy('id', 'desc')->paginate(9);
        return view('admin.items', [
            'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:50',
            'descr' => 'required | string | max:300',
            'address' => 'required | string',
            'phone' => 'required | string',
            'time_start' => 'required | string',
            'time_end' => 'required | string',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:4096',
        ]);

        $path = $request->file('image')->store('items');

        $item = new Item;
        $item->category_id = $request->category;
        $item->img_url = $path;
        $item->name = $request->name;
        $item->descr = $request->descr;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->time_start = $request->time_start;
        $item->time_end = $request->time_end;
        $item->save();

        return redirect()->route('admin-items');
    }

    public function delete(Item $item)
    {
        Storage::delete($item->img_url);
        $item->delete();
        return redirect()->route('admin-items');
    }

    public function show(Item $item)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.edit.item', [
            'item' => $item,
            'categories' => $categories
        ]);
    }

    public function edit(Item $item, Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:50',
            'descr' => 'required | string | max:300',
            'address' => 'required | string',
            'phone' => 'required | string',
            'time_start' => 'required | string',
            'time_end' => 'required | string',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:4096',
        ]);

        if($request->file('image')){
            Storage::delete($item->img_url);
            $path = $request->file('image')->store('items');
            $item->img_url = $path;
        }

        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->descr = $request->descr;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->time_start = $request->time_start;
        $item->time_end = $request->time_end;
        $item->update();

        return redirect()->route('admin-items');
    }
}
