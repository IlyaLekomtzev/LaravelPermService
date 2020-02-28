<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category', [
            'categories' => $categories,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:4096',
        ]);

        $path = $request->file('image')->store('categories');
        $category = new Category;
        $category->name = $request->name;
        $category->img_url = $path;
        $category->save();

        return redirect()->route('admin-category');
    }

    public function delete(Category $category)
    {
        Storage::delete($category->img_url);
        $category->delete();
        return redirect()->route('admin-category');
    }

    public function show(Category $category)
    {
        return view('admin.edit.category', [
            'category' => $category,
        ]);
    }

    public function edit(Category $category, Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:50',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:4096',
        ]);

        if($request->file('image')){
            Storage::delete($category->img_url);
            $path = $request->file('image')->store('categories');
            $category->img_url = $path;
        }

        $category->name = $request->name;
        $category->update();

        return redirect()->route('admin-category');
    }
}
