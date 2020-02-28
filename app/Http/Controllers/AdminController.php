<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $categories = Category::get();
        $items = Item::get();
        $index = 1;
        //Фильтрация и вывод
        $search = $request->get('search');
        if($search){
            $users = User::where('email', $search)->orderBy('id', 'desc')->paginate(10);
        } else{
            $users = User::orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.index', [
            'users' => $users,
            'index' => $index,
            'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function adminOn(User $user)
    {
        $user->is_admin = 1;
        $user->update();

        return redirect()->route('admin-index');
    }

    public function adminOff(User $user)
    {
        $user->is_admin = 0;
        $user->update();

        return redirect()->route('admin-index');
    }

    public function userDelete(User $user)
    {
        $user->delete();
        return redirect()->route('admin-index');
    }
}
