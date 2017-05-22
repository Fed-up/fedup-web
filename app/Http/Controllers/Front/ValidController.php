<?php 
namespace App\Http\Controllers\Front;

use Response;
use View;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidFormRequest;
use Illuminate\Http\Request;





 
 
class ValidController extends Controller{
    

    public function getValid(){
        return View::make('public.valid');
    }

    public function postValid(ValidFormRequest $request) {

        // $input = Input::all();
        
        print_r($request->all());die;
        // $this->validator($input,[
        //     'email' => 'required',
        // ]);

        echo '<pre>'; print_r($input); echo '</pre>'; exit; 
        return View::make('public.valid');
    }


} 

  // public function store(CreateBlogPostRequest $request) {
  //   // Getting all data after success validation.
  //   print_r($request->all());die;
  //   // do your stuff here.
  // }
