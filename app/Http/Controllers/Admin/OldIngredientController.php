<?php

namespace App\Http\Controllers\Admin;

use View;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Recipe_ingredient;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller as BaseController;
// use View;

class IngredientController extends BaseController{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIngredient(){

        // echo "Recipes";exit;
        // $recipe = \App\Recipe::;
        $ingredient = Ingredient::where('id','=', 1)->first();

        // echo '<pre>'; print_r($recipe); echo '</pre>'; exit;

        foreach($ingredient as $r){
             echo '<pre>'; print_r($r); echo '</pre>'; 
        }
        // echo Auth::user(1);
        // echo '<pre>'.$recipe.'</pre>'; 
        exit;
        return View::make('admin.ingredients');
        // ->with(array(
            // 'recipe' => $recipe,
        // ));
    }


} 
