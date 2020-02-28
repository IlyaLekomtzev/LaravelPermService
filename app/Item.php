<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    public function getCategory()
    {
       return Category::find($this->category_id);
    }

    public function getRating($item_id)
    {
        return Comment::where('item_id', $item_id)->avg('rating');
    }

    public function selected()
    {
        return (bool) Select::where('user_id', Auth::id())->where('item_id', $this->id)->first();
    }
}
