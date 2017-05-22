<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient', 'recipe_ingredients')->withPivot('id','amount', 'metric', 'ri_grams', 'ri_cost');
    }

    public function packaging()
    {
        return $this->belongsToMany('App\Models\Packaging', 'recipe_packagings')->withPivot('id','cost');
    }

}
