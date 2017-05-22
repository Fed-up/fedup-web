<?php

namespace App\Http\Controllers\Admin;

use View;
use Input;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient; 
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
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
    public function getIngredients(){
        $ingredients = Ingredient::orderBy('ingredient_name','ASC')->get();

        return View::make('admin.ingredients')
        ->with(array(
            'ingredients' => $ingredients,
        ));
    }

    public function getAddIngredients(){
        
        $no_ingredient = 1;

        // echo '<pre>'; print_r($ingredient->ingredient_name); echo '</pre>'; exit;

        return View::make('admin.ingredient_form')
        ->with(array(
            'no_ingredient' => $no_ingredient,
        ));

        return View::make('admin.ingredients')
        ->with(array(
            'ingredients' => $ingredients,
        ));

        // echo '<pre>'; print_r($recipe); echo '</pre>'; exit;

    }

    public function postAddIngredients(){
        $input = Input::all();
        // echo '<pre>'; print_r($input); echo '</pre>'; exit;
        

        $rules = array(
            // 'title' => 'required|Max:20|unique:menu_recipes,name',
            // 'summary' => 'required',
            // 'length' => 'required',
            // 'difficulty' => 'required',
            // 'cup' => 'required',
            // 'categories' => 'required|not_in:0'
        );
        $validator = Validator::make($input, $rules);
        
        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput($input);
        }else{

            $ingredient = new Ingredient();

            $ingredient_id = $ingredient->id;
            if(isset($input['name'])){$ingredient->ingredient_name = $input['name'];}
            if(isset($input['packet_grams'])){$ingredient->packet_grams = $input['packet_grams'];}
            if(isset($input['cost'])){$ingredient->cost = $input['cost'];}
            
            if(isset($input['metric'])){
                $metric = $input['metric'];
                echo '<pre>'; print_r($metric); echo '</pre>'; exit;
                $mCount = count($metric);

                for ($i=0; $i < $mCount; $i++) { 
                    $iKey = array_keys($metric[$i]);
                    // echo '<pre>'; print_r($iKey[0]); echo '</pre>'; 
                    echo '<pre>'; print_r($metric[$i]); echo '</pre>';
                    echo '<pre>'; print_r($iKey); echo '</pre>'; 

                    switch ($iKey[0]) {

                        case "cup":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->cup = $gCup = 1;
                            }else{
                                $ingredient->cup = $gCup = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "gram":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->gram = 1;
                            }else{
                                $ingredient->gram = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "handful":
                            if(isset($input['calc'])){
                                $ingredient->handful = $gCup/3;
                            }else{
                                if($metric[$i][$iKey[0]] == 0){
                                    $ingredient->handful = 1;
                                }else{
                                    $ingredient->handful = $metric[$i][$iKey[0]];
                                }
                            }
                            break;

                        case "ml":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->ml = 1;
                            }else{
                                $ingredient->mL = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "pinch":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->pinch = 1;
                            }else{
                                $ingredient->pinch = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "sheet":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->sheet = 1;
                            }else{
                                $ingredient->sheet = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "slice":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->slice = 1;
                            }else{
                                $ingredient->slice = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "tablespoon":
                            if(isset($input['calc'])){
                                $ingredient->tablespoon = $gCup/16.67;
                            }else{
                                if($metric[$i][$iKey[0]] == 0){
                                    $ingredient->tablespoon = 1;
                                }else{
                                    $ingredient->tablespoon = $metric[$i][$iKey[0]];
                                }
                            }
                            break;

                        case "teaspoon":
                            if(isset($input['calc'])){
                                $ingredient->teaspoon = $gCup/66.68;
                            }else{
                                if($metric[$i][$iKey[0]] == 0){
                                    $ingredient->teaspoon = 1;
                                }else{
                                    $ingredient->teaspoon = $metric[$i][$iKey[0]];
                                }
                            }
                            break;

                        case "whole":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->whole = 1;
                            }else{
                                $ingredient->whole = $metric[$i][$iKey[0]];
                            }
                            break;

                        default:
                            echo 'Please Enter something to calulate =)'; exit;
                            break;
                    }
                }
                exit;
            }

            // exit;
            
            $ingredient->save();
            $ingredient_id = $ingredient->id;

            if(isset($input['sc'])){
                return Redirect::action('Admin\IngredientController@getIngredients');
            }else{
                return Redirect::action('Admin\IngredientController@getEditIngredients', array($ingredient_id)); 
            }
       

            // echo '<pre>'; print_r($ingredient); echo '</pre>'; exit;
        }
    }

    public function getEditIngredients($id){
        // $ingredients = INgredient::orderBy('ingredient_name','ASC')->get();
        $ingredient = Ingredient::find($id);
        if($ingredient === null){
            $no_ingredient = 1;
        }else{
            $no_ingredient = 0;
        }

        // echo '<pre>'; print_r($ingredient->ingredient_name); echo '</pre>'; exit;

        return View::make('admin.ingredient_form')
        ->with(array(
            'ingredient' => $ingredient,
            'no_ingredient' => $no_ingredient,
        ));
       
    }

    public function postUpdateIngredients(){
        $input = Input::all();
        // echo '<pre>'; print_r($input); echo '</pre>'; exit;
        

        $rules = array(
            // 'title' => 'required|Max:20|unique:menu_recipes,name',
            // 'summary' => 'required',
            // 'length' => 'required',
            // 'difficulty' => 'required',
            // 'cup' => 'required',
            // 'categories' => 'required|not_in:0'
        );
        $validator = Validator::make($input, $rules);
        
        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput($input);
        }else{
            
            // $recipe = Recipe::find($input['id']);
            // $recipe = Recipe::find($input['id']);
            $ingredient = Ingredient::where('id', '=', $input['id'])->first();

            $ingredient_id = $input['id'];
            $metric = $input['metric'];
            $ingredient->ingredient_name = $input['name'];
            $ingredient->packet_grams = $input['packet_grams'];
            $ingredient->cost = $input['cost'];
            

            

            // $ingredient->cup = $input['cup'];
            // $ingredient->gram = $input['gram'];
            // $ingredient->handful = $input['handful'];
            // $ingredient->ml = $input['ml'];
            // $ingredient->pinch = $input['pinch'];
            // $ingredient->sheet = $input['sheet'];
            // $ingredient->slice = $input['slice'];
            // $ingredient->tablespoon = $input['tablespoon'];
            // $ingredient->tablespoon = $input['tablespoon'];
            // $ingredient->whole = $input['whole'];

            $mCount = count($metric);
            

            

            for ($i=0; $i < $mCount; $i++) { 
                $iKey = array_keys($metric[$i]);
                // echo '<pre>'; print_r($iKey[0]); echo '</pre>'; 
                // echo '<pre>'; print_r($metric[$i][$iKey[0]]); echo '</pre>'; 

                switch ($iKey[0]) {

                        case "cup":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->cup = $gCup = 1;
                            }else{
                                $ingredient->cup = $gCup = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "gram":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->gram = 1;
                            }else{
                                $ingredient->gram = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "handful":
                            if(isset($input['calc'])){
                                $ingredient->handful = $gCup/3;
                            }else{
                                if($metric[$i][$iKey[0]] == 0){
                                    $ingredient->handful = 1;
                                }else{
                                    $ingredient->handful = $metric[$i][$iKey[0]];
                                }
                            }
                            break;

                        case "ml":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->ml = 1;
                            }else{
                                $ingredient->mL = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "pinch":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->pinch = 1;
                            }else{
                                $ingredient->pinch = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "sheet":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->sheet = 1;
                            }else{
                                $ingredient->sheet = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "slice":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->slice = 1;
                            }else{
                                $ingredient->slice = $metric[$i][$iKey[0]];
                            }
                            break;

                        case "tablespoon":
                            if(isset($input['calc'])){
                                $ingredient->tablespoon = $gCup/16.67;
                            }else{
                                if($metric[$i][$iKey[0]] == 0){
                                    $ingredient->tablespoon = 1;
                                }else{
                                    $ingredient->tablespoon = $metric[$i][$iKey[0]];
                                }
                            }
                            break;

                        case "teaspoon":
                            if(isset($input['calc'])){
                                $ingredient->teaspoon = $gCup/66.68;
                            }else{
                                if($metric[$i][$iKey[0]] == 0){
                                    $ingredient->teaspoon = 1;
                                }else{
                                    $ingredient->teaspoon = $metric[$i][$iKey[0]];
                                }
                            }
                            break;

                        case "whole":
                            if($metric[$i][$iKey[0]] == 0){
                                $ingredient->whole = 1;
                            }else{
                                $ingredient->whole = $metric[$i][$iKey[0]];
                            }
                            break;

                        default:
                            echo 'Please Enter something to calulate =)'; exit;
                            break;
                    }

            }

            // exit;



            // exit;
            
            $ingredient->save();

            if($ingredient === null){
                $no_ingredient = 1;
            }else{
                $no_ingredient = 0;
            }

            // echo '<pre>'; print_r($ingredient->ingredient_name); echo '</pre>'; exit;

            return View::make('admin.ingredient_form')
            ->with(array(
                'ingredient' => $ingredient,
                'no_ingredient' => $no_ingredient,
            ));
       

            // echo '<pre>'; print_r($ingredient); echo '</pre>'; exit;
        }
    }

    public function getDeleteIngredients($id){
        $ingredient = Ingredient::find($id);
        $ingredient->delete();

        return redirect('/admin/ingredients');
    }

    public function getTest(){
        $recipe = Recipe::find(3);
        $ingredients = Ingredient::orderBy('ingredient_name', 'ASC')->get();
        // $ingredients = Ingredient::orderBy('ingredient_name','ASC')->get();
        // $count = mysqli_num_rows($recipe);

        

        $iArray = array();
        $iArray[0]    = '- Select Ingredient -'; 
        foreach ($ingredients as $ingredient) {
            // echo '<pre>'; print_r($ingredient->ingredient_name); echo '</pre>';
            $iArray[$ingredient->id]  = $ingredient->ingredient_name;        
        }; 

        $metric = array(
            '- Select Metric -',
            'Cup',
            'Gram',
            'Handful',
            'mL',
            'Sheet',
            'Slice',
            'Tablespoon',
            'Teaspoon',
            'Whole',
        ); 

        $recipes = Recipe::orderBy('recipe_name','ASC')->get();

        $mRep = array();
        $mRep[0]    = '- Select Recipe -';  
        foreach ($recipes as $recipe) {
            $mRep[$recipe->id]  = $recipe->recipe_name;
        };

        if($recipe === null){
            $no_recipe = 1;
         }else{
            $no_recipe = 0;
        }

        // echo '<pre>'; print_r($mRep); echo '</pre>';
        // echo '<pre>'; print_r($iArray); echo '</pre>';
        // echo '<pre>'; print_r($metric); echo '</pre>';
        // exit;
        return View::make('admin.test_form')
        ->with(array(
            'recipe' => $recipe,
            'no_recipe' => $no_recipe,
            'iArray' => $iArray,
            'mArray' => $metric,
            'ingredients' => $ingredients,
            'recipes' => $mRep,
        ));

    }

} 




