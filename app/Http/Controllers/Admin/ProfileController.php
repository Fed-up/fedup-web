<?php
namespace App\Http\Controllers\Admin;

use View;
use Input;
use Auth;
use Hash;
// use App\Models\Recipe;
// use App\Models\Ingredient;
// use App\Models\RecipeIngredient;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;


// use View;
 
class ProfileController extends BaseController{
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
    public function getProfile(){
        $user = Auth::user();

        if($user === null){
            $no_user = 1;
        }else{
            $no_user = 0;
        }
        return View::make('admin.profile_form')
        ->with(array(
            'user' => $user,
            'no_user' => $no_user,
        ));
        // echo '<pre>'; print_r($user); echo '</pre>'; exit;
    }

    // public function postUpdateProfile(){
    //     $input = Input::all();
        
        

    //     $user = User::where('id', '=', $input['id'])->get();
    //     echo '<pre>'; print_r($user); echo '</pre>'; exit;
    // }

    public function postUpdateProfile(){
        $input = Input::all();
        $id = Auth::User()->id;
        
        // echo '<pre>'; print_r($input); echo '</pre>';    exit;
        // echo '<pre>'; print_r($id); echo '</pre>';   exit;
        // $id = 7;

        if(isset($input->pword) || isset($input->pconfirm)){
            $rules = array(
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|min:6',
                'password_match' => 'required|min:6|same:password',
                
            );
        }else{
            $rules = array(
                'name' => 'required', 
                'email' => 'required|email|unique:users,email,'.$id,
            );
        }

        $validator = Validator::make($input, $rules);

        
        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput($input);
        }else{

            // echo '<pre>'; print_r($id); echo '</pre>';   exit;

            $user   = User::find($id);
            $user->name             = $input['name'];
            $user->email            = $input['email'];
            if(isset($input->password) || isset($input->password_match)){
                $user->password         = bcrypt($input['pword']);
            }
            $user->pay_per_hour     = $input['pay_per_hour'];
            $user->rent             = $input['rent'];
            $user->business_name    = $input['business_name'];
            $user->street           = $input['street'];
            $user->suburb           = $input['suburb'];
            $user->postcode         = $input['postcode'];
            $user->mobile           = $input['mobile'];

            // $user->fedup = 1;
            
            // $user->user_type    = 'GUEST';
            // $user->active  = (isset($input['unsubscribe'])) ? 0 : 1;
            $user->save();
            // echo '<pre>'; print_r($data); echo '</pre>';     exit;   
        }; 
        // if($user->active == 0){
        //         $message = 'Sorry to know you want to leave.. =('.'<br>'.'If this is a mistake? Quickly change your unsubscription status in your account settings, before you logout =)';
        //     }else{
        //         $message = 'Your account information has been updated =)';
        //     }

        //$data = User::all();  
        if($user === null){
            $no_user = 1;
        }else{
            $no_user = 0;
        }
        return View::make('admin.profile_form')
        ->with(array(
            'user' => $user,
            'no_user' => $no_user,
        ));
    }

    //  public function postReset(Request $request)
    // {   
    //         $this->validate($request, [
    //                 'password' => 'required|confirmed',
    //         ]);
    //         $credentials = $request->only(
    //                 'email', 'password', 'password_confirmation'
    //         );
    //         $user = \Auth::user();
    //         $user->password = bcrypt($credentials['password']);
    //         $user->save();
    //         return redirect('user/'.$user->id);
    // }

} 