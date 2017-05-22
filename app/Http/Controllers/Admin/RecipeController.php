<?php

namespace App\Http\Controllers\Admin;

use View;
use Input;
use Auth;
use App\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient; 
use App\Models\RecipePackagings; 
use App\Models\Packaging; 
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
// use View;
 
class RecipeController extends BaseController{
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
    public function getRecipes(){

        // echo "Recipes";exit;
        // $recipe = \App\Recipe::;
        // $recipe = Recipe::orderBy('id', 'asc')->get();
        $recipe = Recipe::orderBy('recipe_name','ASC')->get();
         // $recipe = Recipe::where('id','=', 1)->first();

        // echo '<pre>'; print_r($recipe->ingredients); echo '</pre>'; exit;

        // foreach($recipe->ingredients as $i){
        //     echo '<pre>'; print_r($i->pivot->amount); echo '</pre>'; 
        //     // echo '<pre>'; print_r($i->ingredient_name); echo '</pre>'; 
        //     // echo '<pre>'; print_r($i->pivot->recipe_name); echo '</pre>'; 
        //     echo '<hr/>';
        // }
        // // echo Auth::user(1);
        // // echo '<pre>'.$recipe.'</pre>'; 
        // exit;
        return View::make('admin.recipes')
        ->with(array(
            'recipe' => $recipe,
        ));
    }

    public function getAddRecipes(){
        $ingredients = Ingredient::orderBy('ingredient_name', 'ASC')->get();
        $packagings = Packaging::orderBy('product_name', 'ASC')->get();



        $iArray = array();
        $iMetric = array();
        $iArray[0]    = '- Select Ingredient -'; 
        foreach ($ingredients as $ingredient) {
            
            $iArray[$ingredient->id]  = $ingredient->ingredient_name; 
            $iMetric[$ingredient->id]  = array(
                'cup' => $ingredient->cup,
                'gram' => $ingredient->gram,
                'handful' => $ingredient->handful,
                'ml' => $ingredient->ml,
                'sheet' => $ingredient->sheet,
                'slice' => $ingredient->slice,
                'tablespoon' => $ingredient->tablespoon,
                'teaspoon' => $ingredient->teaspoon,
                'whole' => $ingredient->whole,
            );        
        }; 

        $pArray = array();
        $ipArray = array();
        $pArray[0]    = '- Select Packaging -'; 
        foreach ($packagings as $packaging) {
            $pArray[$packaging->id]  = $packaging->product_name;  
            $ipArray[$packaging->id]  = array(
                'cost' => $packaging->cost,
                'amount' => $packaging->amount,
            );      
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

        $pSerialize = serialize($ipArray);
        $hpArray = rawurlencode($pSerialize);

        $serialize = serialize($iMetric);
        $hArray = rawurlencode($serialize);

        $no_recipe = 1;

        return View::make('admin.recipe_form')
        ->with(array(
            // 'recipe' => $recipe,
            'no_recipe' => $no_recipe,
            'iArray' => $iArray,
            'mArray' => $metric,
            'ingredients' => $ingredients,
            'iMetric' => $hArray,
            'pArray' => $pArray,
            'ipArray' => $hpArray,
            'pArray' => $pArray,
        ));
        // $no_recipe = 1;
        // return View::make('admin.recipe_form')
        // ->with(array(
        //     'no_recipe' => $no_recipe,
        // ));
    }

    public function postAddRecipes(){
        $input = Input::all();
        
        // echo '<pre>'; print_r($input); echo '</pre>'; exit;

        $data = $input['iMetric'];
        $raw = rawurldecode($data);
        $iMetric = unserialize($raw);

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
            $recipe = new Recipe();

            $recipe->recipe_name     = $input['name'];
            $recipe->recipe_batch = $recipe_batch = $input['recipe_batch'];
            $recipe->total_time = $total_time = $input['total_time'];

            if($recipe->save()){
                $recipe_id = $recipe->id;
                

                // echo '<pre>'; print_r($recipe_id); echo '</pre>';exit;

                if(isset($input['ingredients']) && isset($input['amount']) && isset($input['metric'])){
                    $ingredient = $input['ingredients'];
                    $amount = $input['amount'];
                    $metric = $input['metric'];
                    $array_count = count($ingredient);

                    for($i=0; $i<$array_count; $i++){
                          
                        $iKey = array_keys($ingredient[$i]);
                        $input_ingredient_id = $ingredient[$i][$iKey[0]];

                        if($iKey[0] == 'x'){
                            $riData = new RecipeIngredient();
                            $riData->recipe_id = $recipe_id;
                            $riData->ingredient_id = $input_ingredient_id;
                            $riData->amount = $amount[$i][$iKey[0]];
                            $riMetric = $metric[$i][$iKey[0]];
                            $riData->metric = $riMetric;
                            switch ($riMetric) {

                                case 'Cup':
                                    // $ingredient = Ingredient::where('id', '=', $input_ingredient_id)->first();
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['cup'] * $riData->amount;
                                    break;

                                case 'Gram':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['gram'] * $riData->amount;
                                    break;

                                case 'Handful':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['handful'] * $riData->amount;
                                    break;

                                case 'mL':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['ml'] * $riData->amount;
                                    break;

                                case 'Sheet':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['sheet'] * $riData->amount;
                                    break;

                                case 'Slice':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['slice'] * $riData->amount;
                                    break;

                                case 'Tablespoon':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['tablespoon'] * $riData->amount;
                                    break;

                                case 'Teaspoon':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['teaspoon'] * $riData->amount;
                                    break;

                                case 'Whole':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['whole'] * $riData->amount;
                                    break;

                                default:
                                    echo 'Please Select A Metric Size =)'; exit;
                                    break;
                            }

                        }else{
                            $riData = RecipeIngredient::find($iKey[0]);
                            $riData->ingredient_id = $input_ingredient_id;
                            $riData->amount = $amount[$i][$iKey[0]];
                            foreach ($recipe->ingredients as $ri) {
                                if($ri->id == $riData->ingredient_id){
                                    $riMetric = $metric[$i][$iKey[0]];
                                    $riData->metric = $riMetric;

                                    // echo '<pre>'; print_r($riMetric); echo '</pre>';exit;

                                    switch ($riMetric) {

                                        case 'Cup':
                                            $riData->ri_grams = $ri->cup * $riData->amount;
                                            break;

                                        case 'Gram':
                                            $riData->ri_grams = $ri->gram * $riData->amount;
                                            break;

                                        case 'Handful':
                                            $riData->ri_grams = $ri->handful * $riData->amount;
                                            break;

                                        case 'mL':
                                            $riData->ri_grams = $ri->ml * $riData->amount;
                                            break;

                                        case 'Sheet':
                                            $riData->ri_grams = $ri->sheet * $riData->amount;
                                            break;

                                        case 'Slice':
                                            $riData->ri_grams = $ri->slice * $riData->amount;
                                            break;

                                        case 'Tablespoon':
                                            $riData->ri_grams = $ri->tablespoon * $riData->amount;
                                            break;

                                        case 'Teaspoon':
                                            $riData->ri_grams = $ri->teaspoon * $riData->amount;
                                            break;

                                        case 'Whole':
                                            $riData->ri_grams = $ri->whole * $riData->amount;
                                            break;

                                        default:
                                            echo 'Please Select A Metric Size =)'; exit;
                                            break;
                                    }

                                    if(isset($input['ri_price']) && isset($input['ri_packet_grams'])){
                                        $iCost = $input['ri_price'];
                                        $packet_grams = $input['ri_packet_grams'];
                                        
                                        if($ri->cost != $iCost[$i][$iKey[0]] || $ri->packet_grams != $packet_grams[$i][$iKey[0]]){
                                            $iData = Ingredient::find($input_ingredient_id);
                                            $iData->cost = $iCost[$i][$iKey[0]];                                         
                                            $iData->packet_grams = $packet_grams[$i][$iKey[0]]; 
                                            $iData->save();
                                            // echo '<pre>'; print_r($iData); echo '</pre>'; exit; 
                                        }
                                    }
                                }
                            }                            
                        }

                        $riData->save();

                        // echo '<pre>'; print_r($riData); echo '</pre>'; exit; 

                        // $recipe->Ingredient->updateExistingPivot($riData->id, $riData, false);

                        // $user = User::find(1);

                        // foreach ($user->roles as $role)
                        // {
                        //     $role->pivot->expires = '2013-12-21';
                        //     $role->pivot->save();
                        // }
                        // User::find(1)->roles()->updateExistingPivot($roleId, $attributes);
                    }
                    
                }

                if(isset($input['packaging'])){
                    $packaging = $input['packaging'];

                     // echo '<pre>'; print_r($packaging); echo '</pre>';   exit;

                    $array_count = count($packaging);

                    $ti_cost = 0;
                    $ti_grams = 0;

                    for($i=0; $i<$array_count; $i++){
                          
                        $pKey = array_keys($packaging[$i]);
                        $input_packaging_id = $packaging[$i][$pKey[0]];

                        
                        // echo '<pre>'; print_r($pKey[0]); echo '</pre>'; 
                        // echo '<pre>'; print_r($packaging[$i][$pKey[0]]); echo '</pre>'; 
                        // exit;



                        if($pKey[0] == 'x'){

                            $rpData = new RecipePackagings();
                               
                            $rpData->recipe_id = $recipe_id;
                            $rpData->packaging_id = $input_packaging_id;

                        }else{

                            // echo '<pre>///////////////'; print_r($input_ingredient_id); echo '</pre>'; exit;

                            $rpData = RecipePackagings::find($pKey[0]);

                            $rpData->recipe_id = $recipe_id;
                            $rpData->packaging_id = $input_packaging_id;
                                                        
                        }

                    }

                    $rpData->save();

                };
            }

        }


        if(isset($input['sc'])){
            return Redirect::action('Admin_RecipesController@getRecipes');
        }else{
            return Redirect::action('Admin\RecipeController@getEditRecipes', array($recipe_id)); 
        }
    }

    public function getEditRecipes($id){
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::orderBy('ingredient_name', 'ASC')->get();
        $packagings = Packaging::orderBy('product_name', 'ASC')->get();
        // $ingredients = Ingredient::orderBy('ingredient_name','ASC')->get();
        // $count = mysqli_num_rows($recipe);

        

        $iArray = array();
        $iMetric = array();
        $iArray[0]    = '- Select Ingredient -'; 
        foreach ($ingredients as $ingredient) {
            
            $iArray[$ingredient->id]  = $ingredient->ingredient_name; 
            $iMetric[$ingredient->id]  = array(
                'cup' => $ingredient->cup,
                'gram' => $ingredient->gram,
                'handful' => $ingredient->handful,
                'ml' => $ingredient->ml,
                'sheet' => $ingredient->sheet,
                'slice' => $ingredient->slice,
                'tablespoon' => $ingredient->tablespoon,
                'teaspoon' => $ingredient->teaspoon,
                'whole' => $ingredient->whole,
            );        
        };

        $pArray = array();
        $ipArray = array();
        $pArray[0]    = '- Select Packaging -'; 
        foreach ($packagings as $packaging) {
            $pArray[$packaging->id]  = $packaging->product_name;  
            $ipArray[$packaging->id]  = array(
                'cost' => $packaging->cost,
                'amount' => $packaging->amount,
            );      
        };



        // foreach($recipe->packaging as $packaging) {
        //     echo '<pre>'; print_r($packaging->pivot->id); echo '</pre>'; 
        // }
        // exit; 



        // exit;
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

        // foreach ($recipe->ingredients as $ingredient) {
        //     foreach ($metric as $value) {
        //         if($ingredient->pivot->metric == $value){
        //             echo '<pre> '; print_r($ingredient->pivot->metric); echo '</pre>';
        //         }
        //     }
            
        //     // $iArray[$ingredient->id]  = $ingredient->ingredient_name;        
        // };
        // foreach ($recipe->ingredients as $ingredient) {
        //     echo '<pre>'; print_r($ingredient->pivot->id); echo '</pre>'; 
        //     echo '<pre>'; print_r($ingredient->pivot->ingredient_id); echo '</pre>'; 
        // }exit;
        
        $pSerialize = serialize($ipArray);
        $hpArray = rawurlencode($pSerialize);

        $serialize = serialize($iMetric);
        $hArray = rawurlencode($serialize);
        // echo '<pre>'; print_r($hArray); echo '</pre>'; exit;

        if($recipe === null){
            $no_recipe = 1;
        }else{
            $no_recipe = 0;
        }
        // exit;
        return View::make('admin.recipe_form')
        ->with(array(
            'recipe' => $recipe,
            'no_recipe' => $no_recipe,
            'iArray' => $iArray,
            'mArray' => $metric,
            'ingredients' => $ingredients,
            'iMetric' => $hArray,
            'ipArray' => $hpArray,
            'pArray' => $pArray,
        ));
    }

    public function postUpdateRecipes(){
        $input = Input::all();
        
        // echo '<pre>'; print_r($input); echo '</pre>'; exit;

        $data = $input['iMetric'];
        $raw = rawurldecode($data);
        $iMetric = unserialize($raw);

        $pdata = $input['ipArray'];
        $praw = rawurldecode($pdata);
        $ipArray = unserialize($praw);

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
            // echo '<pre>'; print_r($input); echo '</pre>'; exit;
            // $recipe = Recipe::find($input['id']);
            // $recipe = Recipe::find($input['id']);
            $recipe = Recipe::where('id', '=', $input['id'])->first();

            // echo '<pre>////Packaging'; print_r($recipe->packaging); echo '</pre>'; 
            //             exit;

            // $riData = RecipeIngredient::where('recipe_id', '=', $recipe->id)->get();
            $recipe_id = $input['id'];

            $recipe->recipe_name     = $input['name'];
            // $data->fedup_active = (isset($input['fedup_active'])) ? 1 : 0;
            if($recipe->save()){


                if(isset($input['ingredients']) && isset($input['amount']) && isset($input['metric'])){
                    $ingredient = $input['ingredients'];
                    $amount = $input['amount'];
                    $metric = $input['metric'];
                    $array_count = count($ingredient);

                    $ti_cost = 0;
                    $ti_grams = 0;

                    for($i=0; $i<$array_count; $i++){
                          
                        $iKey = array_keys($ingredient[$i]);
                        $input_ingredient_id = $ingredient[$i][$iKey[0]];

                        
                        // echo '<pre>'; print_r($iKey[0]); echo '</pre>'; 
                        // echo '<pre>'; print_r($metric[$i][$iKey[0]]); echo '</pre>'; 
                        // exit;



                        if($iKey[0] == 'x'){
                            //  echo '<pre>'; print_r(); echo '</pre>';exit;


                            // $it = array_keys($iMetric['input_ingredient_id']);

                            // foreach ($iMetric[1] as $im) {
                            //     echo '<pre>'; print_r($im); echo '</pre>';
                            // }

                            // $it_count = count($it);
                            // for ($i=0; $i < $it_count; $i++) { 
                            //     echo '<pre>'; print_r($it[$i]); echo '</pre>';
                            // }
                            
                            // exit;


                            $riData = new RecipeIngredient();
                           
                            $riData->recipe_id = $recipe_id;
                            $riData->ingredient_id = $input_ingredient_id;
                            $riData->amount = $amount[$i][$iKey[0]];
                            $riMetric = $metric[$i][$iKey[0]];
                            $riData->metric = $riMetric;
                            switch ($riMetric) {

                                case 'Cup':
                                    // $ingredient = Ingredient::where('id', '=', $input_ingredient_id)->first();
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['cup'] * $riData->amount;
                                    break;

                                case 'Gram':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['gram'] * $riData->amount;
                                    break;

                                case 'Handful':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['handful'] * $riData->amount;
                                    break;

                                case 'mL':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['ml'] * $riData->amount;
                                    break;

                                case 'Sheet':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['sheet'] * $riData->amount;
                                    break;

                                case 'Slice':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['slice'] * $riData->amount;
                                    break;

                                case 'Tablespoon':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['tablespoon'] * $riData->amount;
                                    break;

                                case 'Teaspoon':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['teaspoon'] * $riData->amount;
                                    break;

                                case 'Whole':
                                    $riData->ri_grams = $iMetric[$input_ingredient_id]['whole'] * $riData->amount;
                                    break;

                                default:
                                    echo 'Please Select A Metric Size =)'; exit;
                                    break;
                            }

                        }else{

                            

                            // $riData = RecipeIngredient::find($iKey[0]);
                            $riData = RecipeIngredient::where('id', '=', $iKey[0])->first();

                            

                            $riData->ingredient_id = $input_ingredient_id;
                            $riData->amount = $amount[$i][$iKey[0]];

                            // echo '<pre>Recipe -> '; print_r($recipe->ingredients); echo '</pre>'; exit;

                            foreach ($recipe->ingredients as $ri) {
                                $count = count($recipe->ingredients);
                                
                                // echo '<pre>///////////////'; print_r($ri['pivot']['id']); echo '</pre>';
                                
                                // if($input_ingredient_id == $ri->id && $ri['pivot']['id'] == $iKey[0]){
                                //     // echo '<pre>------------------>'; print_r($input_ingredient_id); echo '</pre>';
                                //     // echo '<pre>'; print_r($ri->id); echo '</pre>';
                                //     // echo '<pre>'; print_r($riData->id); echo '</pre>';
                                //     // echo '<pre>'; print_r($iKey[0]); echo '</pre>';
                                // }
                                
                                // if($ri->id == $riData->ingredient_id){
                                if($input_ingredient_id == $ri->id && $ri['pivot']['id'] == $iKey[0]){

                                    $riMetric = $metric[$i][$iKey[0]];
                                    $riData->metric = $riMetric;

                                    // echo '<pre>'; print_r($riMetric); echo '</pre>';exit;
                                     // echo '<pre>---------------------------------------->'; print_r($i); echo '</pre>';

                                    switch ($riMetric) {


                                        case 'Cup':
                                            $riData->ri_grams = $ri->cup * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            // echo '<pre>---------------------------------------->'; print_r($i); echo '</pre>';
                                            break;

                                        case 'Gram':
                                            $riData->ri_grams = $ri->gram * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        case 'Handful':
                                            $riData->ri_grams = $ri->handful * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        case 'mL':
                                            $riData->ri_grams = $ri->ml * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        case 'Sheet':
                                            $riData->ri_grams = $ri->sheet * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        case 'Slice':
                                            $riData->ri_grams = $ri->slice * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        case 'Tablespoon':
                                            $riData->ri_grams = $ri->tablespoon * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        case 'Teaspoon':
                                            $riData->ri_grams = $ri->teaspoon * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        case 'Whole':
                                            $riData->ri_grams = $ri->whole * $riData->amount;
                                            $ri_grams = $riData->ri_grams;
                                            break;

                                        default:
                                            echo 'Please Select A Metric Size =)'; exit;
                                            break;
                                    }

                                    $ri_grams = $riData->ri_grams;

                                    // echo '<pre>'; print_r($ri_grams); echo '</pre>';
                                    // echo '<pre>'; print_r($ti_grams); echo '</pre>'; 
                                    // echo '<hr>';



                                    if(isset($input['ri_price']) && isset($input['ri_packet_grams'])){
                                        $ri_price = $input['ri_price'];
                                        $ri_packet_grams = $input['ri_packet_grams'];

                                        // $ri_cost = $input['ri_cost'];
                                        $ri_grams = $riData->ri_grams;

                                        $packet_grams_percentage = $ri_grams/$ri_packet_grams[$i][$iKey[0]] * 100; 
                                        $ri_cost = $packet_grams_percentage/100 * $ri_price[$i][$iKey[0]];
                                        $riData->ri_cost = $ri_cost;
                                        $ti_cost = $ti_cost + $ri_cost;
                                        $ti_grams = $ti_grams + $ri_grams;

                                        // echo '<pre>'; print_r($packet_grams_percentage); echo '</pre>'; exit; 
                                        

                                        if($ri->cost != $ri_price[$i][$iKey[0]] || $ri->packet_grams != $ri_packet_grams[$i][$iKey[0]]){
                                            // $iData = Ingredient::find($input_ingredient_id);
                                            $iData = Ingredient::where('id', '=', $input_ingredient_id)->first();
                                            $iData->cost = $ri_price[$i][$iKey[0]];                                         
                                            $iData->packet_grams = $ri_packet_grams[$i][$iKey[0]]; 
                                            $iData->save();


                                            // $riData->ri_cost = $ri_cost[$i][$iKey[0]];
                                           
                                        }
                                    }                                
                                }
                            }                            
                        }
                        // echo '<pre>'; print_r($riData->ri_cost); echo '</pre>';  
                        
                       
                        
                        $riData->save();

                        // exit;

                        // $recipe->Ingredient->updateExistingPivot($riData->id, $riData, false);

                        // $user = User::find(1);

                        // foreach ($user->roles as $role)
                        // {
                        //     $role->pivot->expires = '2013-12-21';
                        //     $role->pivot->save();
                        // }
                        // User::find(1)->roles()->updateExistingPivot($roleId, $attributes);
                        // echo '<hr/>';
                    }

                    
                }

                // exit;
                echo '<pre>'; print_r($input); echo '</pre>'; exit;
                // exit;
                if(isset($input['ddi'])){
                    $ddi = $input['ddi'];

                    
                    foreach($ddi as $delete){
                        echo '<pre>'; print_r($delete); echo '</pre>'; exit;
                        $di = RecipeIngredient::find($delete);
                        //$di->active = 9;
                        //$di->save();
                        $di->delete();
                    };
                };

               
                if(isset($input['packaging'])){
                    $packaging = $input['packaging'];


                    

                    $array_count = count($packaging);

                    $tp_cost = 0;

                    for($i=0; $i<$array_count; $i++){
                          
                        $pKey = array_keys($packaging[$i]);
                        $input_packaging_id = $packaging[$i][$pKey[0]];

                        $pAmount = $ipArray[$input_packaging_id]['amount'];
                        $pCost = $ipArray[$input_packaging_id]['cost'];
                        // echo '<pre>'; print_r($pKey[0]); echo '</pre>'; 
                        // echo '<pre>'; print_r($packaging[$i][$pKey[0]]); echo '</pre>'; 
                        // exit;

                        // echo '<pre>'; print_r($ipArray[$input_packaging_id]['cost']); echo '</pre>';   

                        if($pKey[0] == 'x'){

                            $rpData = new RecipePackagings();
                               
                            $rpData->recipe_id = $recipe_id;
                            $rpData->packaging_id = $input_packaging_id;
                            $rpData->cost = $pCost/$pAmount;
                            $tp_cost = $tp_cost + $rpData->cost;

                        }else{

                            
                            // echo '<pre>///////////////'; print_r($pKey[0]); echo '</pre>'; 

                            $rpData = RecipePackagings::find($pKey[0]);

                            // echo '<pre>--'; print_r($ipArray[$input_packaging_id]['cost']); echo '</pre>'; 
                            // echo '<pre>'; print_r($ipArray[$input_packaging_id]['amount']); echo '</pre>'; 

                            $rpData->recipe_id = $recipe_id;
                            $rpData->packaging_id = $input_packaging_id;
                            $rpData->cost = $cost = $pCost/$pAmount;
                            $tp_cost = $tp_cost + $rpData->cost;
                            
                            // echo '<pre>///////////////'; print_r($cost); echo '</pre>';
                            // echo '<pre>///////////////'; print_r($rpData->cost); echo '</pre>';                            
                        }

                         $rpData->save();
                    }
                    
                    

                }else{
                    $tp_cost = 0;
                      
                }

                // echo '<pre>///////////////'; print_r($tp_cost); echo '</pre>'; exit;
                    // exit;

                if(isset($input['ddp'])){
                    $ddp = $input['ddp'];

                    
                    foreach($ddp as $delete){
                        
                        $dp = RecipePackagings::find($delete);
                        //$di->active = 9;
                        //$di->save();
                        $dp->delete();
                    };
                };

              
                // echo '<pre>///////////////'; print_r($input); echo '</pre>'; exit;

                $recipe->recipe_price = $recipe_price = $input['price'];
                $recipe->recipe_time = $recipe_time = $input['time'];
                $recipe->recipe_batch = $recipe_batch = $input['recipe_batch'];
                // echo '<pre>'; print_r($input['sales_batch']); echo '</pre>';   exit;
                $recipe->sales_batch = $sales_batch = $input['sales_batch'];
                $recipe->total_time = $total_time = $input['total_time'];

                if(isset($input['price']) && isset($input['time']) && isset($input['recipe_batch'])){
                    

                    if($input['price'] != null && $input['time'] != null && $input['recipe_batch'] != null && $input['desired_markup'] != null){
                        $rent_cost = 0.2;


                        $recipe->recipe_price = $recipe_price = $input['price'];
                        $recipe->recipe_time = $recipe_time = $input['time'];
                        $recipe->recipe_batch = $recipe_batch = $input['recipe_batch'];
                        // echo '<pre>'; print_r($input['sales_batch']); echo '</pre>';   exit;
                        $recipe->sales_batch = $sales_batch = $input['sales_batch'];
                        $recipe->total_time = $total_time = $input['total_time'];
                        
                        $recipe->ti_grams = $ti_grams;

                        $recipe->recipe_revenue = $recipe_revenue = $recipe_price * $sales_batch;
                        $recipe->staff_cost = $staff_cost = Auth::User()->pay_per_hour/60 * $recipe_time;

                        // $recipe_time = 1.5;
                        if(($sales_batch > 0) && ($sales_batch != $recipe_batch)){
                            $original_ingredient_plate_cost = $ti_cost/$recipe_batch;
                            $ti_cost = $original_ingredient_plate_cost * $sales_batch;
                            $recipe->ti_cost = $ti_cost;

                            $tp_cost = $tp_cost * $sales_batch;
                            // echo '<pre>'; print_r($original_ingredient_plate_cost); echo '</pre>';   
                            // echo '<pre>'; print_r($ti_cost); echo '</pre>';   exit;
                        }else{
                            $recipe->ti_cost = $ti_cost;

                            $tp_cost = $tp_cost * $recipe_batch;
                        }
                        
                        $recipe->packaging_cost = $tp_cost;

                        if($recipe_time < 1){
                            $recipe_second_time = $total_time*100;
                        }else{
                            $recipe_second_time = $total_time*60;
                        }

                        $rent_time = 0.4/60;
                        $year_rent = Auth::User()->rent;
                        $day_rent = Auth::User()->rent/365;
                        $hour_rent = $day_rent/24;
                        $minute_rent = $hour_rent/60;
                        $second_rent = $minute_rent/60;

                        // $mr = $minute_rent/60;

                        // $coffeemin = $recipe_second_time * $mr;
                        // $coffeesec = $second_rent * $recipe_second_time;
                        // $coffee0 = $second_rent * $recipe_second_time;

                        // echo '<pre>'; print_r($coffee0); echo '</pre><hr/>'; 
                        // echo '<pre>'; print_r($coffeemin); echo '</pre>';   
                        // echo '<pre>'; print_r($rpData); echo '</pre>';   exit;


                        $recipe->rent_cost = $rent_cost = $second_rent * $recipe_second_time;
                        $recipe->total_recipe_cost = $total_recipe_cost = $ti_cost + $staff_cost + $rent_cost + $tp_cost;
                        $recipe->plate_cost = $plate_cost = $total_recipe_cost/$sales_batch;
                        $recipe->total_profit = $recipe_profit = $recipe_revenue - $total_recipe_cost;
                        $recipe->plate_profit = $plate_profit = $recipe_profit/$sales_batch;

                        if(isset($input['desired_markup'])){
                            $desired_input_markup = $input['desired_markup'];
                            if($desired_input_markup == 0){
                                $desired_input_markup = 350;
                                $desired_markup = $desired_input_markup/100;
                            }else{
                                $desired_input_markup = $input['desired_markup'];
                                $desired_markup = $desired_input_markup/100;
                            }
                        }else{
                            $desired_input_markup = 100;
                            $desired_markup = $desired_input_markup/100;
                        }

                        if($desired_input_markup > 0){
                            // Price = Cost X Markup Percentage + Cost = $100 X 25% + $100 = $125.
                            $desired_markup_price = ($plate_cost * $desired_markup) + $plate_cost;

                            $recipe->desired_markup = $desired_input_markup;
                            $recipe->desired_markup_price = $desired_markup_price;



                            // echo '<pre>'; print_r($desired_sales_price); echo '</pre>';   exit;
                            
                            // $projected_recipe_revenue = $projected_total_markup_per_piece + $total_cost_per_piece;

                            // $desired_sales_price = $projected_recipe_revenue;
                            // echo '<pre>'; print_r($desired_sales_price); echo '</pre>';  exit;
                        } 
                    }
                    // echo '<pre>---------------->end ->'; print_r($input); echo '</pre>';    exit;

                    // if(isset($ti_cost)){$ti_cost = $ti_cost;}else{$ti_cost = 0;}
                    // if(isset($ti_grams)){$ti_grams = $ti_grams;}else{$ti_grams = 0;}
                    
                    // echo '<pre>---------------->end ->'; print_r($staff_cost); echo '</pre>';    exit;
                    

                    $recipe->save();
                };
                                
                


            }

            // exit;

            
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $recipe = Recipe::find($recipe_id);
                $ingredients = Ingredient::orderBy('ingredient_name', 'ASC')->get();
                $packagings = Packaging::orderBy('product_name', 'ASC')->get();

                $iArray = array();
                $iMetric = array();
                $iArray[0]    = '- Select Ingredient -'; 
                foreach ($ingredients as $ingredient) {
                    
                    $iArray[$ingredient->id]  = $ingredient->ingredient_name; 
                    $iMetric[$ingredient->id]  = array(
                        'cup' => $ingredient->cup,
                        'gram' => $ingredient->gram,
                        'handful' => $ingredient->handful,
                        'ml' => $ingredient->ml,
                        'sheet' => $ingredient->sheet,
                        'slice' => $ingredient->slice,
                        'tablespoon' => $ingredient->tablespoon,
                        'teaspoon' => $ingredient->teaspoon,
                        'whole' => $ingredient->whole,
                    );        
                }; 

                $pArray = array();
                $pArray[0]    = '- Select Packaging -'; 
                foreach ($packagings as $packaging) {
                    $pArray[$packaging->id]  = $packaging->product_name;       
                };

                $serialize = serialize($iMetric);
                $hArray = rawurlencode($serialize);

                
                if($recipe === null){
                    $no_recipe = 1;
                }else{
                    $no_recipe = 0;
                }
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



                $pArray = array();
                $ipArray = array();
                $pArray[0]    = '- Select Packaging -'; 
                foreach ($packagings as $packaging) {
                    $pArray[$packaging->id]  = $packaging->product_name;  
                    $ipArray[$packaging->id]  = array(
                        'cost' => $packaging->cost,
                        'amount' => $packaging->amount,
                    );      
                };
                $pSerialize = serialize($ipArray);
                $hpArray = rawurlencode($pSerialize);
                
                // echo '<pre>'; print_r($recipe); echo '</pre>'; exit;    



        }

        // $recipe = Recipe::findOrFail($id);
        
        // foreach ($recipe->ingredients as $ingredient) {
        //     echo '<pre>'; print_r($ingredient->cup); echo '</pre>';   
        // };
        // echo "<hr/>";
        // if(isset($input['cup']) == 'cup'){
        //     echo "Cuppa!";
        // }
        // echo '<pre>'; print_r($recipe); echo '</pre>'; exit;

        // echo "string";exit;
        return View::make('admin.recipe_form')
        ->with(array(
            'recipe' => $recipe,
            'no_recipe' => $no_recipe,
            'iArray' => $iArray,
            'mArray' => $metric,
            'iMetric' => $hArray,
            'pArray' => $pArray,
            'ipArray' => $hpArray,
        ));
    }

    public function getDeleteRecipes($id){
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect('/admin/recipes');
    }

} 