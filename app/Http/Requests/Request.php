<?php

namespace App\Http\Requests;

use Response;
use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    //
}

 
class ValidFormRequest extends FormRequest {
 
    public function rules()
    {
        return [
            'email'    => 'required|email',
            'date'    => 'required|date',
            // 'password' => 'required|between:8,20|confirmed',
            // 'age'      => 'required|integer|max:60'
        ];
    }
 
    public function authorize()
    {
        return true;
    }
 
}

class ValidBlogRequest extends FormRequest {
 
    public function rules()
    {
        return [
            'topic'    => 'required',
            // 'date'    => 'required|date',
            // 'password' => 'required|between:8,20|confirmed',
            // 'age'      => 'required|integer|max:60'
        ];
    }
 
    public function authorize()
    {
        return true;
    }
 
}

// class ValidPartyFormRequest extends FormRequest {
 
//     public function rules()
//     {
//         return [
//             'email'    => 'required|email',
//             // 'password' => 'required|between:8,20|confirmed',
//             // 'age'      => 'required|integer|max:60'
//         ];
//     }
 
//     public function authorize()
//     {
//         return true;
//     }
 
// }