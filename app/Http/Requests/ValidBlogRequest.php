<?php

namespace App\Http\Requests;

use Response;
use Auth;
use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

abstract class Request extends FormRequest
{
    //
}


class ValidBlogRequest extends FormRequest {
 
    public function rules()
    {
        return [
            'topic'    => 'required',
            // 'video_link'    => 'required',
            // 'password' => 'required|between:8,20|confirmed',
            // 'age'      => 'required|integer|max:60'
        ];
    }
 
    public function authorize()
    {
        return true;
    }
        
    // public function messages()
    // {
    //     return [
    //         'topic.required' => 'What is your topic?', 
    //         'video_link.required' => "Didn't you make a video?", 
    //         // 'total_time.required' => 'We need to know the total time to produce the final product, as it contributes to the overall recipe costs',
    //         // 'total_time.numeric' => 'Math is numbers, we need only numbers',
    //         // 'recipe_batch.required' => 'We need to know how many serves the original recipe makes, as it contributes to the overall recipe costs',
    //         // 'recipe_batch.numeric' => 'Math is numbers, wee need numbers only',

    //         // 'recipe_price'    => 'This is the price you want to sell the recipe for?',
    //         // 'time'    => 'How long does it take for the staff to be hands on working to create the recipe?',
    //         // 'sales_batch'    => 'When you sell it how many do you make at a time?',
    //         // 'sales_batch'    => 'What is the base recipe batch amount?',
    //         // 'wastage'    => 'What percentage of food is wasted per day in your food business?',
            
    //     ];
    // }
}
