<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function text()
    {
        return $this->hasMany('App\Models\Text','link_id', 'id');
        // ->withPivot('id','link_id','text', 'section', 'active');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Images','link_id', 'id');
        // ->withPivot('id','link_id','text', 'section', 'active');
    }
}
