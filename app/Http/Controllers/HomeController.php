<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Item;
use App\Select;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $items = Item::inRandomOrder()->paginate(9);
        return view('home', [
            'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function category()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('category', [
            'categories' => $categories,
        ]);
    }

    public function items(Category $cat)
    {
        $items = Item::orderBy('id', 'desc')->where('category_id', $cat->id)->paginate(9);
        return view('items', [
            'items' => $items,
            'cat' => $cat
        ]);
    }

    public function item(Category $cat, Item $item)
    {
        $comments = Comment::orderBy('id', 'desc')->where('item_id', $item->id)->get();
        return view('item', [
            'item' => $item,
            'cat' => $cat,
            'comments' => $comments,
        ]);
    }

    public function select()
    {
        $selects = Auth::user()->selects()->paginate(9);
        return view('select', [
            'selects' => $selects
        ]);
    }
}
