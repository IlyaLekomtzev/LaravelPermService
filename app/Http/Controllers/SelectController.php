<?php

namespace App\Http\Controllers;

use App\Item;
use App\Select;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectController extends Controller
{
    public function add(Item $item)
    {
        Auth::user()->selects()->attach($item->id);

        return redirect()->back()->with('success','Item created successfully!');
    }

    public function delete(Item $item)
    {
        Auth::user()->selects()->detach($item->id);

        return redirect()->back();
    }

}
