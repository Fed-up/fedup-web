'<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class metric extends Model
{
    //
    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient', 'recipe_ingredients');
    }

}
