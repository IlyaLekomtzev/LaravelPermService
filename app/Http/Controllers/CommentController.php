<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Item;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        $comment = new Comment();
        $comment->item_id = $request->item_id;
        $comment->rating = $request->rating;
        $comment->author_id = $request->author_id;
        $comment->message = $request->message;
        $comment->save();

        $item = Item::where('id', $request->item_id);

        return redirect()->back();
    }
}
