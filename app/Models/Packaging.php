<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    public function recipe()
    {
        return $this->belongsToMany('App\Models\Recipe', 'recipe_packagings')->withPivot('id','cost');
    }
}
