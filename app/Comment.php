<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getAuthor()
    {
        return User::find($this->author_id);
    }
}
