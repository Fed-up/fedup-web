<?php

namespace App\Http\Controllers\Admin;

use View;
use App\Models\Ingredient;
use App\Models\Metric;
use App\Models\Recipe;
use App\Models\Recipe_ingredient;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller as BaseController;
// use View;

class MetricController extends BaseController{
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
    public function getMetric(){

        // echo "Recipes";exit;
        // $recipe = \App\Recipe::;
        $metric = Metric::orderBy('metric_name','asc')->get();

        // echo '<pre>'; print_r($metric); echo '</pre>'; exit;

        foreach($metric->ingredients as $r){
             echo '<pre>'; print_r($r); echo '</pre>'; 
        }
        // echo Auth::user(1);
        // echo '<pre>'.$recipe.'</pre>'; 
        exit;
        return View::make('admin.metrics');
        // ->with(array(
            // 'recipe' => $recipe,
        // ));
    }


} 
