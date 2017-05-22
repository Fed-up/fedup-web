<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    public function recipes()
    {
        return $this->belongsToMany('App\Models\Recipe', 'recipe_ingredients')->withPivot('id','amount', 'metric', 'ri_grams', 'ri_cost');
    }

    // public function metrics()
    // {
    //     return $this->belongsToMany('App\Models\metric', 'recipe_ingredients');
    // }
}
