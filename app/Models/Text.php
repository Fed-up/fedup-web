<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
   	public function Post()
    {
        return $this->hasOne('App\Models\Post', 'id', 'link_id');
        // ->withPivot('id','link_id','text', 'section', 'active');
    }
}
