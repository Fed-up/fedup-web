<?php

namespace App\Http\Controllers\Admin;

use View;
use Input;
use App\Models\Packaging;
use App\Models\Ingredient;
use App\Models\RecipeIngredient; 
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
// use View;
 
class PackagingController extends BaseController{
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
    public function getPackaging(){
        $packaging = Packaging::orderBy('product_name','ASC')->get();

        return View::make('admin.packaging')
        ->with(array( 
            'packaging' => $packaging,
        ));
    }

    public function getAddPackaging(){
        
        $no_packaging = 1;

        // echo '<pre>'; print_r($ingredient->ingredient_name); echo '</pre>'; exit;

        return View::make('admin.packaging_form')
        ->with(array(
            'no_packaging' => $no_packaging,
        ));
        // echo '<pre>'; print_r($recipe); echo '</pre>'; exit;

    }

    public function postAddPackaging(){
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

            $packaging = new Packaging();

            $packaging_id = $packaging->id;
            if(isset($input['name'])){$packaging->product_name = $input['name'];}
            if(isset($input['cost'])){$packaging->cost = $input['cost'];}
            if(isset($input['product_amount'])){$packaging->amount = $input['product_amount'];}
            if(isset($input['company'])){$packaging->company = $input['company'];}
            if(isset($input['code'])){$packaging->product_code = $input['code'];}
            
            
            // exit;
            
            $packaging->save();
            $packaging_id = $packaging->id;

            if(isset($input['sc'])){
                return Redirect::action('Admin\PackagingController@getPackaging');
            }else{
                return Redirect::action('Admin\PackagingController@getEditPackaging', array($packaging_id)); 
            }
       

            // echo '<pre>'; print_r($ingredient); echo '</pre>'; exit;
        }
    }

    public function getEditPackaging($id){
        // $ingredients = INgredient::orderBy('ingredient_name','ASC')->get();
        $packaging = Packaging::find($id);
        if($packaging === null){
            $no_packaging = 1;
        }else{
            $no_packaging = 0;
        }

        // echo '<pre>'; print_r($ingredient->ingredient_name); echo '</pre>'; exit;

        return View::make('admin.packaging_form')
        ->with(array(
            'packaging' => $packaging,
            'no_packaging' => $no_packaging,
        ));
       
    }

    public function postUpdatePackaging(){
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
            $packaging = Packaging::where('id', '=', $input['id'])->first();

            $packaging_id = $packaging->id;
            if(isset($input['name'])){$packaging->product_name = $input['name'];}
            if(isset($input['cost'])){$packaging->cost = $input['cost'];}
            if(isset($input['product_amount'])){$packaging->amount = $input['product_amount'];}
            if(isset($input['company'])){$packaging->company = $input['company'];}
            if(isset($input['code'])){$packaging->product_code = $input['code'];}
            
            
            // exit;
            
            $packaging->save();
            $packaging_id = $packaging->id;

            if(isset($input['sc'])){
                return Redirect::action('Admin\PackagingController@getPackaging');
            }else{
                return Redirect::action('Admin\PackagingController@getEditPackaging', array($packaging_id)); 
            }
       

            // echo '<pre>'; print_r($ingredient); echo '</pre>'; exit;
        }
    }

    public function getDeletePackaging($id){
        $packaging = Packaging::find($id);
        $packaging->delete();

        return redirect('/admin/packaging');
    }

} 




