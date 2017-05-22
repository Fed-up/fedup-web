<?php

namespace App\Http\Controllers\Front;

use View;
use Input;
use Auth;
use Mail;
use Agent;
use App\User;
use App\Models\Post;
use App\Models\Images;
use App\Models\Text;
use App\Models\Kids;

use Carbon\Carbon;
use Response;
// use Validator;
// use Illuminate\Support\Facades\Validator;
// use DispatchesCommands, ValidatesRequests;
// use App\Http\Controllers\Front\Agent;
// use Jenssegers\Agent\Agent;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Validator;

// use Response;
// use View;
// use Input;
// use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidKidsRequest;
use App\Http\Requests\ValidBookRequest;


// use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;
// use Illuminate\Routing\Controller as BaseController;
// use View;
use App\Http;

 
class PublicController extends Controller{
    
    public function getHomePage(){

        $blogpost = Post::where('promote', '=', 1)->where('active', '=', 1)->where('topic','=','blog')->first();
        $hp_promote = Post::where('hp_promote','=', 1)->where('active', '=', 1)->first();

        $post_count = count($blogpost);
        $promo_count = count($hp_promote);
        
        if($post_count >= 1){
            $image_count = count($blogpost->images);
            foreach ($blogpost->images as $key => $img) {
                if ($img->type == 1) {
                    $bg_image =  $img;
                }
            }
            
            $no_post = 0;
        }else{
            $no_post = 1;
            $bg_image = "/images/site/bw.jpg";
            $blogpost = 0;
        }

        // echo '<pre>'; print_r($promo_count); echo '</pre>'; exit; 

        if($promo_count >= 1){
            $hp_image_count = count($hp_promote->images);
            foreach ($hp_promote->images as $key => $pimg) {
                if ($pimg->type == 1) {
                    $promo_bg_image =  $pimg;
                }
            }
            
            $no_hp = 0;
        }else{
            $no_hp = 1;
            $promo_bg_image = "/images/site/sarah.png";
            $hp_promote = 0;
        }
        
        // echo '<pre>'; print_r($promo_bg_image); echo '</pre>'; exit; 
        // $images = $blogpost->images;


        return View::make('public.index')
        ->with(array(
            'blogpost' => $blogpost,
            'bg_image' => $bg_image,
            'no_post' => $no_post,

            'hp_promote' => $hp_promote,
            'promo_bg_image' => $promo_bg_image,
            'no_hp' => $no_hp,
        )); 
    }


    public function getBookTable(){

        return View::make('public.booking')
        ->with(array(
            'no_message' => 1,
            'no_post' => 1,
        )); 
    }

    public function postBookTable(ValidBookRequest $request) {
        $input = Input::all();
        
            $messageData = array(
                'name' => $input['name'],
                'people' => $input['people'],
                'email' => $input['email'],
                'date' => $input['date'],
                'time' => $input['time'],
            );


            // echo '<pre>'; print_r($er); echo '</pre>'; exit; 


            // echo '<pre>'; print_r($messageData); echo '</pre>'; exit; 

            $messageD = $messageData;
            $e = $input['email'];
            $emails = ['eat@fedupproject.com.au', $e];
            // $emails = ['myoneemail@esomething.com', 'myother@esomething.com','myother2@esomething.com'];

            // if(isset($messageD['error_parent_food'])){
            //     echo '<pre>'; print_r($messageD['error_parent_food']); echo '</pre>'; exit; 
            // }
            // echo '<pre>'; print_r($messageD); echo '</pre>'; exit; 

            Mail::send('emails.bookmail', $messageD, function($message) use ($messageD, $input, $emails) {
                $message->to($emails)->subject('Fed Up Project Booking');
            });

            // dd('Mail Send Successfully');

        

        // echo '<pre>'; print_r($input); echo '</pre>'; exit; 

        $me = 'A copy email was sent to: '. $input['email'];
        $do = 'Booking Complete! We will contact you shortly to confirm everything =)';

        return View::make('public.booking')
        ->with(array(
            'no_message' => 0,
            'no_post' => 1,
            'message' => $me,
            'message2' => $do,
        ));

        // $this->validator($input,[
        //     'email' => 'required',
        // ]);

        // echo '<pre>'; print_r($input); echo '</pre>'; exit; 

    }

    public function getURL($link){

        // echo '<pre>'; print_r($link); echo '</pre>'; exit; 
        $post = Post::where('url', '=', $link)->first();
         // echo '<pre>'; print_r($post->post_name); echo '</pre>'; exit; 
        // echo '<pre>'; print_r(); echo '</pre>';

        $post_array = array();
        foreach ($post->Text as $key => $text) {
            if($text->active == 9){

            }else{
                $post_array[$text->id]  = array(
                    'description' => $text->description,
                    'section' => $text->section,
                    'link' => $text->link,
                    'ordering' => $text->ordering,
                    'active' => $text->active,
                );
            }
            
        }

        $promo_posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->get();
        $ppost_3 = 0;
        $ppost_array = array();
        $images_array = array();
         // $ppost_array = new stdClass();
   // $object->property = 'Here we go';

   // var_dump($object);
        foreach ($promo_posts as $ppost) {
           $pcount = count($ppost->images);
           if($ppost_3 <= 2){
                if($ppost->id != $post->id){
                    if ($pcount > 0) {
                        // echo '<pre>'; print_r($ppost->created_at); echo '</pre>';

                        $pimage_count = count($ppost->images);
                        $pimage = $pimage_count -1;

                        $ppost_array[$ppost->id] = array(
                            'id'    => $ppost->id,
                            'title' => $ppost->post_name,
                            'blurb' => $ppost->blurb,
                            'image' => $ppost->images[$pimage]->file_name,
                            'url'    => $ppost->url,
                            'hashtag'    => $ppost->hashtag,
                        );
                       // echo '<hr/>'; 
                       // $ppost_array->post = $ppost;
                       $ppost_3 ++;
                    }
                }
            }
        }


      

        $images = $post->images;
        $image_count = count($images);
        $text_check = $post->Text;
        $text_count = count($text_check);

        // echo '<pre>'; print_r($image_count); echo '</pre>'; exit;

        if($text_count == 0){
            $post_array = 'luke';   
        }else{
            $post_array = array();
        }

        if($image_count >= 1){
            foreach ($images as $key => $image) {
            
                if($image->ordering == 0){
                    $background_image = $image;
                }else{
                    $images_array[$image->ordering] = $image;
                }
            }  
        }else{
            $background_image = "no_background_image";
            $images_array = "no_images";
        }

         // echo '<pre>'; print_r($images_array); echo '</pre>'; exit;


        $post_array = array();
        if($text_count != 1){
            foreach ($post->Text as $key => $text) {
            
                if($text === null){

                }elseif($text->active == 9){

                }else{
                    $post_array[$text->id]  = array(
                        'description' => $text->description,
                        'section' => $text->section,
                        'link' => $text->link,
                        'ordering' => $text->ordering,
                        'active' => $text->active,
                    );
                }
                
            }    
        }else{
            $text = 'no_text';
        }

        if($post === null){
            $no_post = 1;
        }else{
            $no_post = 0;
        }

        if(empty($post->video_link)){
            // echo '<pre>'; print_r($post->video_link); echo '</pre>'; exit;
            $no_video = 1;
        }else{
            $no_video = 0;
        }



        return View::make('public.getfedup')
        ->with(array(
            // 'recipe' => $recipe,
            // 'no_recipe' => $no_recipe,
            // 'iArray' => $iArray,
            // 'mArray' => $metric,
            // 'ingredients' => $ingredients,
            // 'iMetric' => $hArray,
            // 'ipArray' => $hpArray,
            // 'pArray' => $pArray,
            'images_array' => $images_array, 
            'image_count' => $image_count, 
            'text_count' => $text_count,
            'post' => $post,
            'ppost_array' => $ppost_array,
            'no_post' => $no_post,
            'text' => $text,
            'post_array' => $post_array,
            'background_image' => $background_image,
            'preview' => 0,
            'no_video' => $no_video,
        )); 

    }

    


    public function getURLs($link){

        // echo '<pre>'; print_r($link); echo '</pre>'; exit; 
        $post = Post::where('url', '=', $link)->first();
        if($post == null){
            return View::make('errors.error');
        }
        // echo '<pre>'; print_r($post->topic); echo '</pre>';
        $topic = $post->topic;

        $post_array = array();
        foreach ($post->Text as $key => $text) {
            if($text->active == 9){

            }else{
                $post_array[$text->id]  = array(
                    'description' => $text->description,
                    'section' => $text->section,
                    'link' => $text->link,
                    'ordering' => $text->ordering,
                    'active' => $text->active,
                );
            }
            
        }

        $promo_posts = Post::orderBy('ordering', 'ASC')->where('active', '=', 1)->where('topic','=',$topic)->get();

        $ppost_array = array();
        $images_array = array();

        $pre_post = $post->ordering-1;
        $next_post = $post->ordering+1;
        $next_post_url = "#";
        $pre_post_url = "#";
        // echo '<pre>'; print_r($post->ordering); echo '</pre>';
        // echo '<pre>'; print_r($pre_post); echo '</pre>';
        // echo '<pre>'; print_r($next_post); echo '</pre>';



        // $closest = getClosest($post->ordering, $promo_posts);


        $total_posts = count($promo_posts);

        // echo '<pre>'; print_r($closest); echo '</pre>';exit;

        $cp = 0;
        foreach ($promo_posts as $topic_post) {

            if($topic_post->ordering == $pre_post){
                $pre_post_url = $topic_post->url;
                // echo '<pre>PRE URL'; print_r($pre_post_url); echo '</pre>';
            }elseif($pre_post < $total_posts && $pre_post_url == "#"){
                $pre_post_url = "";
            }
            if($topic_post->ordering == $next_post){
                $next_post_url = $topic_post->url;
            }elseif($next_post > $total_posts && $pre_post_url == "#"){
                $next_post_url = "";
            }
        }

        // echo '<pre><hr>Post'; print_r($post->ordering); echo '</pre>';
        // echo '<pre> Pre'; print_r($pre_post); echo '</pre>';
        // echo '<pre>Next'; print_r($next_post); echo '</pre>';exit;

        // // $total_posts = count($promo_posts);

        // echo '<pre>'; print_r($total_posts); echo '</pre><hr>';
        // echo '<pre>'; print_r($pre_post_url); echo '</pre>';
        // echo '<pre>'; print_r($next_post_url); echo '</pre>';exit;

      

        $images = $post->images;
        $image_count = count($images);
        $text_check = $post->Text;
        $text_count = count($text_check);

        // echo '<pre>'; print_r($image_count); echo '</pre>'; exit;

        if($text_count == 0){
            $post_array = 'luke';   
        }else{
            $post_array = array();
        }

        if($image_count >= 1){
            foreach ($images as $key => $image) {
            
                if($image->type == 1){
                    $background_image = $image;
                }elseif($image->type == 0){
                    $vertical_image = $image;
                }else{
                    $images_array[$image->ordering] = $image;
                }
            }  
        }else{
            $background_image = "no_background_image";
            $images_array = "no_images";
        }

         // echo '<pre>'; print_r($background_image->file_path); echo '</pre>'; exit;


        $post_array = array();
        if($text_count != 1){
            foreach ($post->Text as $key => $text) {
            
                if($text === null){

                }elseif($text->active == 9){

                }else{
                    $post_array[$text->id]  = array(
                        'description' => $text->description,
                        'section' => $text->section,
                        'link' => $text->link,
                        'ordering' => $text->ordering,
                        'active' => $text->active,
                    );
                }
                
            }    
        }else{
            $text = 'no_text';
        }

        if($post === null){
            $no_post = 1;
        }else{
            $no_post = 0;
        }

        if(empty($post->video_link)){
            // echo '<pre>'; print_r($post->video_link); echo '</pre>'; exit;
            $no_video = 1;
        }else{
            $no_video = 0;
        }


        if ( Agent::isMobile() ) {
            return View::make('public.mtest6')
            ->with(array(
                // 'recipe' => $recipe,
                // 'no_recipe' => $no_recipe,
                // 'iArray' => $iArray,
                // 'mArray' => $metric,
                // 'ingredients' => $ingredients,
                // 'iMetric' => $hArray,
                // 'ipArray' => $hpArray,
                'no_message' => 0,
                'images_array' => $images_array, 
                'image_count' => $image_count, 
                'text_count' => $text_count,
                'post' => $post,
                'ppost_array' => $ppost_array,
                'no_post' => $no_post,
                'text' => $text,
                'post_array' => $post_array,
                'background_image' => $background_image,
                'vertical_image' => $vertical_image,
                'preview' => 0,
                'no_video' => $no_video,
                'next_post_url' => $next_post_url,
                'pre_post_url' => $pre_post_url,

            )); 
        }else{
            return View::make('public.test6')
            ->with(array(
                // 'recipe' => $recipe,
                // 'no_recipe' => $no_recipe,
                // 'iArray' => $iArray,
                // 'mArray' => $metric,
                // 'ingredients' => $ingredients,
                // 'iMetric' => $hArray,
                // 'ipArray' => $hpArray,
                'no_message' => 0,
                'images_array' => $images_array, 
                'image_count' => $image_count, 
                'text_count' => $text_count,
                'post' => $post,
                'ppost_array' => $ppost_array,
                'no_post' => $no_post,
                'text' => $text,
                'post_array' => $post_array,
                'background_image' => $background_image,
                'vertical_image' => $vertical_image,
                'preview' => 0,
                'no_video' => $no_video,
                'next_post_url' => $next_post_url,
                'pre_post_url' => $pre_post_url,
            )); 
        }
    }

    public function getBlog(){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('topic', '=', 'blog')->limit(12)->get();
        $post_count = count($posts);
        $promo_post_array = array();
        $post_array = array();
        $ppa = 0;

        // echo '<pre>'; print_r($posts); echo '</pre>'; exit; 

        foreach ($posts as $pk => $post) {
            
            
            $pcount = count($post->images);

            $no_vi = 1; //vertical
            $no_pi = 1; //Promo
            $no_hi = 1; //Header

            if ($pcount > 0) {
                $pimage = $pcount -1;
                if ($post->promote == 1) {
                    foreach ($post->images as $img) {
                        if($img->type == 1){
                            $pi = $img;
                            $no_pi = 0;
                            // 'image' => $post->images[$pimage]->file_name,
                        }elseif($img->type == 0){
                            $vi = $img;
                            $no_vi = 0;
                        }
                    }
                    if($no_pi == 0 && $no_vi == 0){
                        $promo_post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $pi->file_name,
                            'vimage' => $vi->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        );   
                    }
                     
                    // echo '<pre>'; print_r($promo_post_array); echo '</pre>'; exit;
                    $ppa = 1;
                }
                foreach ($post->images as $img) {
                    if($img->type == 0){
                        $vi = $img;
                        $no_vi = 0;
                        // 'image' => $post->images[$pimage]->file_name,
                    }elseif($img->type == 1){
                        $hi = $img;
                        $no_hi = 0;
                    }
                }
                if($no_hi == 0 && $no_vi == 0){
                    $post_array[$post->id] = array(
                        'id'    => $post->id,
                        'title' => $post->post_name,
                        'blurb' => $post->blurb,
                        'image' => $vi->file_name,
                        'himage' => $hi->file_name,
                        'url'    => $post->url,
                        'hashtag'    => $post->hashtag,
                        'date'  => $post->created_at->format('d M y'),
                    ); 
                }
            }  
        }


        // echo '<pre>'; print_r($post_array); echo '</pre>'; exit; 

        if($ppa == 1){
            $merge_post = $promo_post_array + $post_array;  
        }else{
            $merge_post = $post_array;
        }


        
        $c = 1;
        foreach ($merge_post as $pak => $pa_post) {
            switch ($c) {

                case 1 :
                    $first = $pa_post;
                    break;

                case 2:
                    $second = $pa_post;
                    break;

                case 3:
                    $third = $pa_post;
                    break;

                case 4:
                    $forth = $pa_post;
                    break;

                case 5:
                    $fith = $pa_post;
                    break;

                case 6:
                    $sixth = $pa_post;
                    break;

                case 7:
                    $seventh = $pa_post;
                    break;

                case 8:
                    $eighth = $pa_post;
                    break;

                case 9:
                    $nineth = $pa_post;
                    break;

                case 10:
                    $tenth = $pa_post;
                    break;

                case 11:
                    $eleventh = $pa_post;
                    break;

                case 12:
                    $twelfth = $pa_post;
                    break;

                default:
                    echo 'Please Select A Metric Size =)'; exit;
                    break;
            }
            // echo '<pre><hr>'; print_r($c); echo '</pre>'; 
            // echo '<pre>'; print_r($pa_post); echo '</pre>'; 
            $c++;
        }
        $c--;
        // echo '<pre>'; print_r($first['id']); echo '</pre>'; exit; 

        if(Agent::isMobile()){
            switch ($c) {

            case 1 :
                return View::make('public.m1_get_blog')
                ->with(array(
                    'first' => $first,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 2:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'post_array' => $post_array,
                )); 
                break;

            case 3:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 4:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 5:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'post_array' => $post_array,
                )); 
                break;
            case 6:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'post_array' => $post_array,
                )); 

                break;

            case 7:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'post_array' => $post_array,
                )); 
                break;

            case 8:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'post_array' => $post_array,
                )); 
                break;

            case 9:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'post_array' => $post_array,
                ));
                break;

            case 10:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'post_array' => $post_array,
                ));
                break;

            case 11:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'post_array' => $post_array,
                ));

                break;

            case 12:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'twelfth' => $twelfth,
                    'post_array' => $post_array,
                ));
                break;

            default:
                echo 'There are no posts =( Sarah & Tom pick up your game!'; exit;
                break;
            }
        }else{
            return View::make('public.get_blog')
            ->with(array(
                'first' => $first,
                'post_array' => $post_array,
                
            )); 

        }
   
    }

    public function getMenu(){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('topic', '=', 'menu')->limit(12)->get();
        $post_count = count($posts);
        $promo_post_array = array();
        $post_array = array();
        $ppa = 0;

        // echo '<pre>'; print_r($posts); echo '</pre>'; exit; 

        foreach ($posts as $pk => $post) {
            
            
            $pcount = count($post->images);

            $no_vi = 1; //vertical
            $no_pi = 1; //Promo
            $no_hi = 1; //Header

            if ($pcount > 0) {
                $pimage = $pcount -1;
                if ($post->promote == 1) {
                    foreach ($post->images as $img) {
                        if($img->type == 1){
                            $pi = $img;
                            $no_pi = 0;
                            // 'image' => $post->images[$pimage]->file_name,
                        }elseif($img->type == 0){
                            $vi = $img;
                            $no_vi = 0;
                        }
                    }
                    if($no_pi == 0 && $no_vi == 0){
                        $promo_post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $pi->file_name,
                            'vimage' => $vi->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        );   
                    }
                     
                    // echo '<pre>'; print_r($promo_post_array); echo '</pre>'; exit;
                    $ppa = 1;
                }
                foreach ($post->images as $img) {
                    if($img->type == 0){
                        $vi = $img;
                        $no_vi = 0;
                        // 'image' => $post->images[$pimage]->file_name,
                    }elseif($img->type == 1){
                        $hi = $img;
                        $no_hi = 0;
                    }
                }
                if($no_hi == 0 && $no_vi == 0){
                    $post_array[$post->id] = array(
                        'id'    => $post->id,
                        'title' => $post->post_name,
                        'blurb' => $post->blurb,
                        'image' => $vi->file_name,
                        'himage' => $hi->file_name,
                        'url'    => $post->url,
                        'hashtag'    => $post->hashtag,
                        'date'  => $post->created_at->format('d M y'),
                    ); 
                }
            }  
        }


         

        if($ppa == 1){
            $merge_post = $promo_post_array + $post_array;  
        }else{
            $merge_post = $post_array;
        }


        
        $c = 1;
        foreach ($merge_post as $pak => $pa_post) {
            switch ($c) {

                case 1 :
                    $first = $pa_post;
                    break;

                case 2:
                    $second = $pa_post;
                    break;

                case 3:
                    $third = $pa_post;
                    break;

                case 4:
                    $forth = $pa_post;
                    break;

                case 5:
                    $fith = $pa_post;
                    break;

                case 6:
                    $sixth = $pa_post;
                    break;

                case 7:
                    $seventh = $pa_post;
                    break;

                case 8:
                    $eighth = $pa_post;
                    break;

                case 9:
                    $nineth = $pa_post;
                    break;

                case 10:
                    $tenth = $pa_post;
                    break;

                case 11:
                    $eleventh = $pa_post;
                    break;

                case 12:
                    $twelfth = $pa_post;
                    break;

                default:
                    echo 'Please Select A Metric Size =)'; exit;
                    break;
            }
            // echo '<pre><hr>'; print_r($c); echo '</pre>'; 
            // echo '<pre>'; print_r($pa_post); echo '</pre>'; 
            $c++;
        }
        $c--;
        // echo '<pre>'; print_r($first['id']); echo '</pre>'; exit; 
        // echo '<pre>'; print_r($first); echo '</pre>'; exit;
        if(Agent::isMobile()){
            switch ($c) {

            case 1 :
                return View::make('public.m1_get_blog')
                ->with(array(
                    'first' => $first,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 2:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'post_array' => $post_array,
                )); 
                break;

            case 3:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 4:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 5:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'post_array' => $post_array,
                )); 
                break;
            case 6:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'post_array' => $post_array,
                )); 

                break;

            case 7:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'post_array' => $post_array,
                )); 
                break;

            case 8:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'post_array' => $post_array,
                )); 
                break;

            case 9:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'post_array' => $post_array,
                ));
                break;

            case 10:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'post_array' => $post_array,
                ));
                break;

            case 11:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'post_array' => $post_array,
                ));

                break;

            case 12:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'twelfth' => $twelfth,
                    'post_array' => $post_array,
                ));
                break;

            default:
                echo 'There are no blogs =( Sarah & Tom pick up your game!'; exit;
                break;
            }
        }else{
            return View::make('public.get_menu')
            ->with(array(
                'first' => $first,
                'post_array' => $post_array,
                
            )); 

        }
   
    }

    public function getCatering(){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('topic', '=', 'catering')->limit(12)->get();
        $post_count = count($posts);
        $promo_post_array = array();
        $post_array = array();
        $ppa = 0;

        // echo '<pre>'; print_r($posts); echo '</pre>'; exit; 

        foreach ($posts as $pk => $post) {
            
            
            $pcount = count($post->images);

            $no_vi = 1; //vertical
            $no_pi = 1; //Promo
            $no_hi = 1; //Header

            if ($pcount > 0) {
                $pimage = $pcount -1;
                if ($post->promote == 1) {
                    foreach ($post->images as $img) {
                        if($img->type == 1){
                            $pi = $img;
                            $no_pi = 0;
                            // 'image' => $post->images[$pimage]->file_name,
                        }elseif($img->type == 0){
                            $vi = $img;
                            $no_vi = 0;
                        }
                    }
                    if($no_pi == 0 && $no_vi == 0){
                        $promo_post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $pi->file_name,
                            'vimage' => $vi->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        );   
                    }
                     
                    // echo '<pre>'; print_r($promo_post_array); echo '</pre>'; exit;
                    $ppa = 1;
                }
                foreach ($post->images as $img) {
                    if($img->type == 0){
                        $vi = $img;
                        $no_vi = 0;
                        // 'image' => $post->images[$pimage]->file_name,
                    }elseif($img->type == 1){
                        $hi = $img;
                        $no_hi = 0;
                    }
                }
                if($no_hi == 0 && $no_vi == 0){
                    $post_array[$post->id] = array(
                        'id'    => $post->id,
                        'title' => $post->post_name,
                        'blurb' => $post->blurb,
                        'image' => $vi->file_name,
                        'himage' => $hi->file_name,
                        'url'    => $post->url,
                        'hashtag'    => $post->hashtag,
                        'date'  => $post->created_at->format('d M y'),
                    ); 
                }
            }  
        }


        // echo '<pre>'; print_r($post_array); echo '</pre>'; exit; 

        if($ppa == 1){
            $merge_post = $promo_post_array + $post_array;  
        }else{
            $merge_post = $post_array;
        }


        
        $c = 1;
        foreach ($merge_post as $pak => $pa_post) {
            switch ($c) {

                case 1 :
                    $first = $pa_post;
                    break;

                case 2:
                    $second = $pa_post;
                    break;

                case 3:
                    $third = $pa_post;
                    break;

                case 4:
                    $forth = $pa_post;
                    break;

                case 5:
                    $fith = $pa_post;
                    break;

                case 6:
                    $sixth = $pa_post;
                    break;

                case 7:
                    $seventh = $pa_post;
                    break;

                case 8:
                    $eighth = $pa_post;
                    break;

                case 9:
                    $nineth = $pa_post;
                    break;

                case 10:
                    $tenth = $pa_post;
                    break;

                case 11:
                    $eleventh = $pa_post;
                    break;

                case 12:
                    $twelfth = $pa_post;
                    break;

                default:
                    echo 'Please Select A Metric Size =)'; exit;
                    break;
            }
            // echo '<pre><hr>'; print_r($c); echo '</pre>'; 
            // echo '<pre>'; print_r($pa_post); echo '</pre>'; 
            $c++;
        }
        $c--;
        // echo '<pre>'; print_r($first['id']); echo '</pre>'; exit; 

        if(Agent::isMobile()){
            switch ($c) {

            case 1 :
                return View::make('public.m1_get_blog')
                ->with(array(
                    'first' => $first,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 2:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'post_array' => $post_array,
                )); 
                break;

            case 3:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 4:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 5:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'post_array' => $post_array,
                )); 
                break;
            case 6:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'post_array' => $post_array,
                )); 

                break;

            case 7:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'post_array' => $post_array,
                )); 
                break;

            case 8:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'post_array' => $post_array,
                )); 
                break;

            case 9:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'post_array' => $post_array,
                ));
                break;

            case 10:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'post_array' => $post_array,
                ));
                break;

            case 11:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'post_array' => $post_array,
                ));

                break;

            case 12:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'twelfth' => $twelfth,
                    'post_array' => $post_array,
                ));
                break;

            default:
                echo 'There are no blogs =( Sarah & Tom pick up your game!'; exit;
                break;
            }
        }else{
            return View::make('public.get_catering')
            ->with(array(
                'first' => $first,
                'post_array' => $post_array,
                
            )); 

        }
   
    }

    public function getProject(){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('topic', '=', 'project')->limit(12)->get();
        $post_count = count($posts);
        $promo_post_array = array();
        $post_array = array();
        $ppa = 0;

        // echo '<pre>'; print_r($posts); echo '</pre>'; exit; 

        foreach ($posts as $pk => $post) {
            
            
            $pcount = count($post->images);

            $no_vi = 1; //vertical
            $no_pi = 1; //Promo
            $no_hi = 1; //Header

            if ($pcount > 0) {
                $pimage = $pcount -1;
                if ($post->promote == 1) {
                    foreach ($post->images as $img) {
                        if($img->type == 1){
                            $pi = $img;
                            $no_pi = 0;
                            // 'image' => $post->images[$pimage]->file_name,
                        }elseif($img->type == 0){
                            $vi = $img;
                            $no_vi = 0;
                        }
                    }
                    if($no_pi == 0 && $no_vi == 0){
                        $promo_post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $pi->file_name,
                            'vimage' => $vi->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        );   
                    }
                     
                    // echo '<pre>'; print_r($promo_post_array); echo '</pre>'; exit;
                    $ppa = 1;
                }
                foreach ($post->images as $img) {
                    if($img->type == 0){
                        $vi = $img;
                        $no_vi = 0;
                        // 'image' => $post->images[$pimage]->file_name,
                    }elseif($img->type == 1){
                        $hi = $img;
                        $no_hi = 0;
                    }
                }
                if($no_hi == 0 && $no_vi == 0){
                    $post_array[$post->id] = array(
                        'id'    => $post->id,
                        'title' => $post->post_name,
                        'blurb' => $post->blurb,
                        'image' => $vi->file_name,
                        'himage' => $hi->file_name,
                        'url'    => $post->url,
                        'hashtag'    => $post->hashtag,
                        'date'  => $post->created_at->format('d M y'),
                    ); 
                }
            }  
        }


        // echo '<pre>'; print_r($post_array); echo '</pre>'; exit; 

        if($ppa == 1){
            $merge_post = $promo_post_array + $post_array;  
        }else{
            $merge_post = $post_array;
        }


        
        $c = 1;
        foreach ($merge_post as $pak => $pa_post) {
            switch ($c) {

                case 1 :
                    $first = $pa_post;
                    break;

                case 2:
                    $second = $pa_post;
                    break;

                case 3:
                    $third = $pa_post;
                    break;

                case 4:
                    $forth = $pa_post;
                    break;

                case 5:
                    $fith = $pa_post;
                    break;

                case 6:
                    $sixth = $pa_post;
                    break;

                case 7:
                    $seventh = $pa_post;
                    break;

                case 8:
                    $eighth = $pa_post;
                    break;

                case 9:
                    $nineth = $pa_post;
                    break;

                case 10:
                    $tenth = $pa_post;
                    break;

                case 11:
                    $eleventh = $pa_post;
                    break;

                case 12:
                    $twelfth = $pa_post;
                    break;

                default:
                    echo 'Please Select A Metric Size =)'; exit;
                    break;
            }
            // echo '<pre><hr>'; print_r($c); echo '</pre>'; 
            // echo '<pre>'; print_r($pa_post); echo '</pre>'; 
            $c++;
        }
        $c--;
        // echo '<pre>'; print_r($first['id']); echo '</pre>'; exit; 

        if(Agent::isMobile()){
            switch ($c) {

            case 1 :
                return View::make('public.m1_get_blog')
                ->with(array(
                    'first' => $first,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 2:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'post_array' => $post_array,
                )); 
                break;

            case 3:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 4:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 5:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'post_array' => $post_array,
                )); 
                break;
            case 6:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'post_array' => $post_array,
                )); 

                break;

            case 7:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'post_array' => $post_array,
                )); 
                break;

            case 8:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'post_array' => $post_array,
                )); 
                break;

            case 9:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'post_array' => $post_array,
                ));
                break;

            case 10:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'post_array' => $post_array,
                ));
                break;

            case 11:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'post_array' => $post_array,
                ));

                break;

            case 12:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'twelfth' => $twelfth,
                    'post_array' => $post_array,
                ));
                break;

            default:
                echo 'There are no blogs =( Sarah & Tom pick up your game!'; exit;
                break;
            }
        }else{
            return View::make('public.get_project')
            ->with(array(
                'first' => $first,
                'post_array' => $post_array,
                
            )); 

        }
   
    }

    public function getEvent(){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('topic', '=', 'event')->limit(12)->get();
        $post_count = count($posts);
        $promo_post_array = array();
        $post_array = array();
        $ppa = 0;

        // echo '<pre>'; print_r($posts); echo '</pre>'; exit; 

        foreach ($posts as $pk => $post) {
            
            
            $pcount = count($post->images);

            $no_vi = 1; //vertical
            $no_pi = 1; //Promo
            $no_hi = 1; //Header

            if ($pcount > 0) {
                $pimage = $pcount -1;
                if ($post->promote == 1) {
                    foreach ($post->images as $img) {
                        if($img->type == 1){
                            $pi = $img;
                            $no_pi = 0;
                            // 'image' => $post->images[$pimage]->file_name,
                        }elseif($img->type == 0){
                            $vi = $img;
                            $no_vi = 0;
                        }
                    }
                    if($no_pi == 0 && $no_vi == 0){
                        $promo_post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $pi->file_name,
                            'vimage' => $vi->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        );   
                    }
                     
                    // echo '<pre>'; print_r($promo_post_array); echo '</pre>'; exit;
                    $ppa = 1;
                }
                foreach ($post->images as $img) {
                    if($img->type == 0){
                        $vi = $img;
                        $no_vi = 0;
                        // 'image' => $post->images[$pimage]->file_name,
                    }elseif($img->type == 1){
                        $hi = $img;
                        $no_hi = 0;
                    }
                }
                if($no_hi == 0 && $no_vi == 0){
                    $post_array[$post->id] = array(
                        'id'    => $post->id,
                        'title' => $post->post_name,
                        'blurb' => $post->blurb,
                        'image' => $vi->file_name,
                        'himage' => $hi->file_name,
                        'url'    => $post->url,
                        'hashtag'    => $post->hashtag,
                        'date'  => $post->created_at->format('d M y'),
                    ); 
                }
            }  
        }


        // echo '<pre>'; print_r($post_array); echo '</pre>'; exit; 

        if($ppa == 1){
            $merge_post = $promo_post_array + $post_array;  
        }else{
            $merge_post = $post_array;
        }


        
        $c = 1;
        foreach ($merge_post as $pak => $pa_post) {
            switch ($c) {

                case 1 :
                    $first = $pa_post;
                    break;

                case 2:
                    $second = $pa_post;
                    break;

                case 3:
                    $third = $pa_post;
                    break;

                case 4:
                    $forth = $pa_post;
                    break;

                case 5:
                    $fith = $pa_post;
                    break;

                case 6:
                    $sixth = $pa_post;
                    break;

                case 7:
                    $seventh = $pa_post;
                    break;

                case 8:
                    $eighth = $pa_post;
                    break;

                case 9:
                    $nineth = $pa_post;
                    break;

                case 10:
                    $tenth = $pa_post;
                    break;

                case 11:
                    $eleventh = $pa_post;
                    break;

                case 12:
                    $twelfth = $pa_post;
                    break;

                default:
                    echo 'Please Select A Metric Size =)'; exit;
                    break;
            }
            // echo '<pre><hr>'; print_r($c); echo '</pre>'; 
            // echo '<pre>'; print_r($pa_post); echo '</pre>'; 
            $c++;
        }
        $c--;
        // echo '<pre>'; print_r($first['id']); echo '</pre>'; exit; 

        if(Agent::isMobile()){
            switch ($c) {

            case 1 :
                return View::make('public.m1_get_blog')
                ->with(array(
                    'first' => $first,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 2:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'post_array' => $post_array,
                )); 
                break;

            case 3:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 4:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 5:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'post_array' => $post_array,
                )); 
                break;
            case 6:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'post_array' => $post_array,
                )); 

                break;

            case 7:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'post_array' => $post_array,
                )); 
                break;

            case 8:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'post_array' => $post_array,
                )); 
                break;

            case 9:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'post_array' => $post_array,
                ));
                break;

            case 10:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'post_array' => $post_array,
                ));
                break;

            case 11:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'post_array' => $post_array,
                ));

                break;

            case 12:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'twelfth' => $twelfth,
                    'post_array' => $post_array,
                ));
                break;

            default:
                echo 'There are no blogs =( Sarah & Tom pick up your game!'; exit;
                break;
            }
        }else{
            return View::make('public.get_event')
            ->with(array(
                'first' => $first,
                'post_array' => $post_array,
                
            )); 

        }
   
    }

    public function getCake(){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('topic', '=', 'cake')->limit(12)->get();
        $post_count = count($posts);
        $promo_post_array = array();
        $post_array = array();
        $ppa = 0;

        // echo '<pre>'; print_r($posts); echo '</pre>'; exit; 

        foreach ($posts as $pk => $post) {
            
            
            $pcount = count($post->images);

            $no_vi = 1; //vertical
            $no_pi = 1; //Promo
            $no_hi = 1; //Header

            if ($pcount > 0) {
                $pimage = $pcount -1;
                if ($post->promote == 1) {
                    foreach ($post->images as $img) {
                        if($img->type == 1){
                            $pi = $img;
                            $no_pi = 0;
                            // 'image' => $post->images[$pimage]->file_name,
                        }elseif($img->type == 0){
                            $vi = $img;
                            $no_vi = 0;
                        }
                    }
                    if($no_pi == 0 && $no_vi == 0){
                        $promo_post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $pi->file_name,
                            'vimage' => $vi->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        );   
                    }
                     
                    // echo '<pre>'; print_r($promo_post_array); echo '</pre>'; exit;
                    $ppa = 1;
                }
                foreach ($post->images as $img) {
                    if($img->type == 0){
                        $vi = $img;
                        $no_vi = 0;
                        // 'image' => $post->images[$pimage]->file_name,
                    }elseif($img->type == 1){
                        $hi = $img;
                        $no_hi = 0;
                    }
                }
                if($no_hi == 0 && $no_vi == 0){
                    $post_array[$post->id] = array(
                        'id'    => $post->id,
                        'title' => $post->post_name,
                        'blurb' => $post->blurb,
                        'image' => $vi->file_name,
                        'himage' => $hi->file_name,
                        'url'    => $post->url,
                        'hashtag'    => $post->hashtag,
                        'date'  => $post->created_at->format('d M y'),
                    ); 
                }
            }  
        }


        // echo '<pre>'; print_r($post_array); echo '</pre>'; exit; 

        if($ppa == 1){
            $merge_post = $promo_post_array + $post_array;  
        }else{
            $merge_post = $post_array;
        }


        
        $c = 1;
        foreach ($merge_post as $pak => $pa_post) {
            switch ($c) {

                case 1 :
                    $first = $pa_post;
                    break;

                case 2:
                    $second = $pa_post;
                    break;

                case 3:
                    $third = $pa_post;
                    break;

                case 4:
                    $forth = $pa_post;
                    break;

                case 5:
                    $fith = $pa_post;
                    break;

                case 6:
                    $sixth = $pa_post;
                    break;

                case 7:
                    $seventh = $pa_post;
                    break;

                case 8:
                    $eighth = $pa_post;
                    break;

                case 9:
                    $nineth = $pa_post;
                    break;

                case 10:
                    $tenth = $pa_post;
                    break;

                case 11:
                    $eleventh = $pa_post;
                    break;

                case 12:
                    $twelfth = $pa_post;
                    break;

                default:
                    echo 'Please Select A Metric Size =)'; exit;
                    break;
            }
            // echo '<pre><hr>'; print_r($c); echo '</pre>'; 
            // echo '<pre>'; print_r($pa_post); echo '</pre>'; 
            $c++;
        }
        $c--;
        // echo '<pre>'; print_r($first['id']); echo '</pre>'; exit; 

        if(Agent::isMobile()){
            switch ($c) {

            case 1 :
                return View::make('public.m1_get_blog')
                ->with(array(
                    'first' => $first,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 2:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'post_array' => $post_array,
                )); 
                break;

            case 3:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 4:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 5:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'post_array' => $post_array,
                )); 
                break;
            case 6:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'post_array' => $post_array,
                )); 

                break;

            case 7:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'post_array' => $post_array,
                )); 
                break;

            case 8:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'post_array' => $post_array,
                )); 
                break;

            case 9:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'post_array' => $post_array,
                ));
                break;

            case 10:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'post_array' => $post_array,
                ));
                break;

            case 11:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'post_array' => $post_array,
                ));

                break;

            case 12:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'twelfth' => $twelfth,
                    'post_array' => $post_array,
                ));
                break;

            default:
                echo 'There are no blogs =( Sarah & Tom pick up your game!'; exit;
                break;
            }
        }else{
            return View::make('public.get_cake')
            ->with(array(
                'first' => $first,
                'post_array' => $post_array,
                
            )); 

        }
   
    }


    public function getDash(){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->limit(8)->get();

        foreach ($posts as $post) {
           $pcount = count($post->images);
           // if($ppost_3 <= 2){
           //      if($ppost->id != $post->id){
                    if ($pcount > 0) {
                        // $date = Carbon\Carbon::createFromFormat($format, $input)

                        // dd( $post->created_at->format('Y-m-d'));

                        // echo '<pre>'; print_r($post->created_at->format('d M y')); echo '</pre>';

                        // $pimage_count = count($ppost->images);
                        $pimage = $pcount -1;

                        $post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $post->images[$pimage]->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        ); 
                       // echo '<hr/>'; 
                       // $ppost_array->post = $ppost;
                       // $ppost_3 ++;
                    }
            //     }
            // }
        }
        // exit;
        // echo '<pre>'; print_r($post_array); echo '</pre>'; exit;    

        return View::make('public.getall')
        ->with(array(
            // 'posts' => $posts,
            'post_array' => $post_array,
        )); 
    }

    public function getHashtag($hashtag){
        $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('hashtag', '=', $hashtag)->limit(8)->get();
        $tag = $hashtag;
        // $posts = Post::orderBy('created_at', 'DESC')->where('active', '=', 1)->where('topic', '=', 'cake')->limit(12)->get();
        $post_count = count($posts);
        $promo_post_array = array();
        $post_array = array();
        $ppa = 0;

        // echo '<pre>'; print_r($posts); echo '</pre>'; exit; 

        foreach ($posts as $pk => $post) {
            
            
            $pcount = count($post->images);

            $no_vi = 1; //vertical
            $no_pi = 1; //Promo
            $no_hi = 1; //Header

            if ($pcount > 0) {
                $pimage = $pcount -1;
                if ($post->promote == 1) {
                    foreach ($post->images as $img) {
                        if($img->type == 1){
                            $pi = $img;
                            $no_pi = 0;
                            // 'image' => $post->images[$pimage]->file_name,
                        }elseif($img->type == 0){
                            $vi = $img;
                            $no_vi = 0;
                        }
                    }
                    if($no_pi == 0 && $no_vi == 0){
                        $promo_post_array[$post->id] = array(
                            'id'    => $post->id,
                            'title' => $post->post_name,
                            'blurb' => $post->blurb,
                            'image' => $pi->file_name,
                            'vimage' => $vi->file_name,
                            'url'    => $post->url,
                            'hashtag'    => $post->hashtag,
                            'date'  => $post->created_at->format('d M y'),
                        );   
                    }
                     
                    // echo '<pre>'; print_r($promo_post_array); echo '</pre>'; exit;
                    $ppa = 1;
                }
                foreach ($post->images as $img) {
                    if($img->type == 0){
                        $vi = $img;
                        $no_vi = 0;
                        // 'image' => $post->images[$pimage]->file_name,
                    }elseif($img->type == 1){
                        $hi = $img;
                        $no_hi = 0;
                    }
                }
                if($no_hi == 0 && $no_vi == 0){
                    $post_array[$post->id] = array(
                        'id'    => $post->id,
                        'title' => $post->post_name,
                        'blurb' => $post->blurb,
                        'image' => $vi->file_name,
                        'himage' => $hi->file_name,
                        'url'    => $post->url,
                        'hashtag'    => $post->hashtag,
                        'date'  => $post->created_at->format('d M y'),
                    ); 
                }
            }  
        }


        // echo '<pre>'; print_r($post_array); echo '</pre>'; exit; 

        if($ppa == 1){
            $merge_post = $promo_post_array + $post_array;  
        }else{
            $merge_post = $post_array;
        }


        
        $c = 1;
        foreach ($merge_post as $pak => $pa_post) {
            switch ($c) {

                case 1 :
                    $first = $pa_post;
                    break;

                case 2:
                    $second = $pa_post;
                    break;

                case 3:
                    $third = $pa_post;
                    break;

                case 4:
                    $forth = $pa_post;
                    break;

                case 5:
                    $fith = $pa_post;
                    break;

                case 6:
                    $sixth = $pa_post;
                    break;

                case 7:
                    $seventh = $pa_post;
                    break;

                case 8:
                    $eighth = $pa_post;
                    break;

                case 9:
                    $nineth = $pa_post;
                    break;

                case 10:
                    $tenth = $pa_post;
                    break;

                case 11:
                    $eleventh = $pa_post;
                    break;

                case 12:
                    $twelfth = $pa_post;
                    break;

                default:
                    echo 'Please Select A Metric Size =)'; exit;
                    break;
            }
            // echo '<pre><hr>'; print_r($c); echo '</pre>'; 
            // echo '<pre>'; print_r($pa_post); echo '</pre>'; 
            $c++;
        }
        $c--;
        // echo '<pre>'; print_r($first['id']); echo '</pre>'; exit; 

        if(Agent::isMobile()){
            switch ($c) {

            case 1 :
                return View::make('public.m1_get_blog')
                ->with(array(
                    'first' => $first,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 2:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'post_array' => $post_array,
                )); 
                break;

            case 3:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 4:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'post_array' => $post_array,
                    
                )); 
                break;

            case 5:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'post_array' => $post_array,
                )); 
                break;
            case 6:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'post_array' => $post_array,
                )); 

                break;

            case 7:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'post_array' => $post_array,
                )); 
                break;

            case 8:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'post_array' => $post_array,
                )); 
                break;

            case 9:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'post_array' => $post_array,
                ));
                break;

            case 10:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'post_array' => $post_array,
                ));
                break;

            case 11:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'post_array' => $post_array,
                ));

                break;

            case 12:
                return View::make('public.get_blog')
                ->with(array(
                    'first' => $first,
                    'second' => $second,
                    'third' => $third,
                    'forth' => $forth,
                    'fith' => $fith,
                    'sixth' => $sixth,
                    'seventh' => $seventh,
                    'eighth' => $eighth,
                    'nineth' => $nineth,
                    'tenth' => $tenth,
                    'eleventh' => $eleventh,
                    'twelfth' => $twelfth,
                    'post_array' => $post_array,
                ));
                break;

            default:
                echo 'There are no blogs =( Sarah & Tom pick up your game!'; exit;
                break;
            }
        }else{
            return View::make('public.get_hashtag')
            ->with(array(
                'first' => $first,
                'post_array' => $post_array,
                
            )); 

        }
   
    }

    public function getCafeInfo(){

        $hp_promote = Post::where('hp_promote','=', 1)->where('active', '=', 1)->first();
        $promo_count = count($hp_promote);

        // echo '<pre>'; print_r($hp_promote); echo '</pre>'; exit; 
        
        if($promo_count >= 1){
            $hp_image_count = count($hp_promote->images);
            foreach ($hp_promote->images as $key => $pimg) {
                if ($pimg->type == 1) {
                    $promo_bg_image =  $pimg;
                }
            }
            
            $no_hp = 0;
        }else{
            $no_hp = 1;
            $promo_bg_image = "/images/site/sarah.png";
            $hp_promote = 0;
        }
    

        // echo '<pre>'; print_r($no_hp); echo '</pre>'; exit; 

        return View::make('public.slides')
        ->with(array(
            'hp_promote' => $hp_promote,
            'promo_bg_image' => $promo_bg_image,
            'no_hp' => $no_hp,
        )); 

    
    }



    public function getDessert(){
        // $token = "94698d5b9b00463481a789a88fd89195";
        // $client_id ="dbc68a32a245496a85281256639e2ee3";
        // // $insta_url = 'https://api.instagram.com/v1/tags/sonaughtybutnice/media/recent?client_id='.$token.'&count=12';

        // // $insta_url = 'https://api.instagram.com/v1/users/self/feed?client_id='.$token.'&count=12';
        // $insta_url = 'https://api.instagram.com/v1/users/592534639/media/recent/?client_id='.$client_id.'&count=18';


        // // echo '<pre>'; print_r($insta_url); echo '</pre>'; exit;
        // // $insta_json = file_get_contents($insta_url);
        // // $insta_array = json_decode($insta_json, $true);


        // //  Initiate curl
        // $ch = curl_init();
        // // Disable SSL verification
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // // Will return the response, if false it print the response
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // // Set the url
        // curl_setopt($ch, CURLOPT_URL,$insta_url);
        // // Execute
        // $result=curl_exec($ch);
        // // Closing
        // curl_close($ch);

        // // Will dump a beauty json :3
        // $insta_array = json_decode($result, true);
        // // foreach($insta_array['data'] as $image){
        // //  echo '<pre>'; print_r($image['images']['low_resolution']['url']); echo '</pre>';    
        // }
        // echo '<pre>'; print_r($insta_array); echo '</pre>'; exit;    
        // exit;
        // if(empty($insta_array)){
        //  echo '<pre>'; print_r($token); echo '</pre>'; exit; 
        // }
        

        return View::make('public.dessert')
        ->with(array(
            // 'insta_array' => $insta_array 
        ));
    }

    

    public function getTest(){


        return View::make('public.test')
        ->with(array(
            'no_message' => 1,
        ));
    }
    public function getTest1(){


        return View::make('public.test1')
        ->with(array(
            'no_message' => 1,
        ));
    }

    public function getTest2(){


        return View::make('public.test2')
        ->with(array(
            'no_message' => 1,
        ));
    }


    public function getTest3(){


        return View::make('public.test3')
        ->with(array(
            'no_message' => 1,
        ));
    }

    public function getTest4(){


        return View::make('public.test4')
        ->with(array(
            'no_message' => 1,
        ));
    }

    public function getTest5(){


        return View::make('public.test5')
        ->with(array(
            'no_message' => 1,
        ));
    }

    public function getTest6(){


        if ( Agent::isMobile() ) {
            return View::make('public.mtest6')
            ->with(array(
                'no_message' => 1,
            ));
        } else {
            return View::make('public.test6')
            ->with(array(
                'no_message' => 1,
            ));
        }       
    }

    public function getValid(){
        return View::make('public.valid');
    }

    public function getLocation(){
        return View::make('public.location');
    }
    
    //     $input = Input::all();
        

    //     // $this->validator($input,[
    //     //     'email' => 'required',
    //     // ]);

    //     echo '<pre>'; print_r($input); echo '</pre>'; exit; 
    //     return View::make('public.valid');
    // }
    public function getKids(){


        return View::make('public.kids')
        ->with(array(
            'no_message' => 1,
            'no_post' => 0,
        ));
    }

    // public function postKids(){
    public function postKids(ValidKidsRequest $request) {
        $input = Input::all();
        

        // $this->validator($input,[
        //     'email' => 'required',
        // ]);

        // echo '<pre>'; print_r($input); echo '</pre>'; exit; 
// 
        $rules = array(
            // 'title' => 'required|Max:20|unique:menu_recipes,name',
            'summary' => 'required',
            // 'length' => 'required',
            // 'difficulty' => 'required',
            // 'cup' => 'required',
            // 'categories' => 'required|not_in:0'
        );
        $v = 0;
        // $validator = Validator::make($input, $rules);

        
        if($input['email'] == null){
            return Redirect::back();
                // ->withErrors($validator)
                // ->withInput($input);
        
        }else{


            // $error = 0;

            $error_parent_name = 1;
            // $error_parent_name = 0;
            $error_mobile = 1;
            $error_email = 1;
            $error_date  = 1;
            $error_child_name = 1; 
            $error_child_age = 1;
            $error_child_gender = 1;
            $error_attend = 1;
            $error_invitation = 1;
            $error_package = 1;
            $error_intolerance = 1;
            $error_activity = 1;
            $error_child_age = 1;
            $error_parent_attend = 1;
            $error_parent_food = 1;
            $error_savoury = 1;
            $error_snack = 1;

            // $snack  = $input['snack_chip'] + $input['snack_bread'] + $input['snack_fruit'];

            if($input['snack_chip'] || $input['snack_bread'] || $input['snack_fruit']){
                $snack = isset($input['snack_chip'])? "</br> - Bowl of Corn Chips " : "";
                $snack .= isset($input['snack_bread'])? "</br> - Fairy Bread " : "";
                $snack .= isset($input['snack_fruit'])? "</br> - Special Fruit Punch " : "";

                // echo '<pre>'; print_r($snack); echo '</pre>'; exit; 
            }

            if(isset($input['activity'])){
                $activity = $input['activity'];
                switch ($activity) {

                    case 1 :
                        $activity = '</br> - Pancakes';
                        break;

                    case 2:
                        $activity = '</br> - Chocolate Crunch Balls';
                        break;

                    case 3:
                        $activity = '</br> - Honey crackles';
                        break;

                    case 4:
                        $activity = '</br> - Mini pizzas';
                        break;

                    case 5:
                        $activity = '</br> - Decorate cupcakes';
                        break;

                    default:
                        $activity = '</br> - Let us know when you get a chance';
                        break;
                }

                // echo '<pre>'; print_r($snack); echo '</pre>'; exit; 
            }

            if(isset($input['package'])){
                $package = $input['package'];
                switch ($package) {

                    case 1 :
                        $package = '</br> - 3x Sweets, 2x Savoury, fruit punch';
                        break;

                    case 2:
                        $package = '</br> - 4x Sweets, 3x Savoury, fruit punch';
                        break;

                    default:
                        $package = '</br> - Let us know when you get a chance';
                        break;
                }

                // echo '<pre>'; print_r($snack); echo '</pre>'; exit; 
            }

            if(isset($input['savoury'])){
                $savoury = $input['savoury'];
                switch ($savoury) {

                    case 1 :
                        $savoury = '</br> - Spinach & Ricotta Pastizzi';
                        break;

                    case 2:
                        $savoury = '</br> - Gourmet assorted pies';
                        break;

                    case 3 :
                        $savoury = '</br> - Homemade sausage rolls';
                        break;

                    case 4:
                        $savoury = '</br> - Assorted sushi';
                        break;

                    case 5:
                        $savoury = '</br> - Mini pizzas (Special Hawaiian, Classic Margarita, BBQ Chicken & Veg)';
                        break;

                    default:
                        $savoury = '</br> - Let us know when you get a chance';
                        break;
                }

                // echo '<pre>'; print_r($snack); echo '</pre>'; exit; 
            }






            $error = array();
            $kArray = array();
            $kids = new Kids();
            if($input['parent_name'] != null){$kids->parent_name = $input['parent_name'];}else{

                $error_parent_name = "Can you please let us know your name or the child's parent's name?";
                // echo '<pre>'; print_r($error_parent_name); echo '</pre>'; exit; 
            }
            if($input['mobile'] != null){$kids->mobile = $input['mobile'];}else{$error_mobile = "We missed your mobile number, can you please tell us this for direct confirmation of booking?";}
            if($input['email'] != null){$kids->email = $input['email'];}else{$error_email = "Unfortunately we didn't get your email address and therefore cannot email you your confirmation details.";}
            if($input['date'] != null){$kids->date = $input['date'];}else{$error_date = "I don't think the date was inputed correctly can you please canform the date & time of booking?";}
            if($input['child_name'] != null){$kids->child_name = $input['child_name'];}else{$error_child_name = "What is your child's or Birthdays Child's name?";}
            if($input['child_age'] != null){$kids->child_age = $input['child_age'];}else{$error_child_age = "What is your child's or Birthdays Child's age?";}
            if($input['child_gender'] != null){$kids->child_gender = $input['child_gender'];}else{$error_child_gender = "What is your child's or Birthdays Child's gender?";}
            if($input['attend'] != null){$kids->attend = $input['attend'];}else{$error_attend = "Just need to know how many children will be attending?";}
            if($input['invitation'] != null){$kids->invitation = $input['invitation'];}else{$error_invitation = "Would you like us to create the invitation for you?";}
            if($input['package'] != null){$kids->package = $input['package'];}else{$error_package = "What food package would you like for the children?";}
            if($input['intolerance'] != null){$kids->intolerance = $input['intolerance'];}else{$error_intolerance = "Just wanted to confirm that their are no food intolerances that the children have?";}
            if($input['activity'] != null){$kids->activity = $input['activity'];}else{$error_activity = "We do a cooking activity with the kids at the party which package would you prefer to do?";}
            if($input['parent_attend'] != null){$kids->parent_attend = $input['parent_attend'];}else{$error_parent_attend = "Are their any parents that will be attending this party?";}
            if($input['parent_food'] != null){$kids->parent_food = $input['parent_food'];}else{$error_parent_food = "Will any of the parents attending want to eat food?";}
            if($input['savoury'] != null){$kids->savoury = $input['savoury'];}else{$error_savoury = "Would you like any savoury foods?";}
            // if($input['snack'] != null){$kids->snack = $input['snack'];}else{$error_snack = "Snacks are included, which snack would your child like?";}

            // $kids->save();


            
            
            // echo '<pre>'; print_r($error_parent_name); echo '</pre>';
            if($error_parent_name != 1){$error['error_parent_name'] = $error_parent_name;}
            // $data['pussy']='wagon';
            // $stack, "apple", "raspberry");
            if($error_mobile != 1){$error['error_mobile'] = $error_mobile;}
            if($error_email != 1){$error['error_email'] = $error_email;}
            if($error_date != 1){$error['error_date'] = $error_date;}
            if($error_child_name != 1){$error['error_child_name'] = $error_child_name;}
            if($error_child_age != 1){$error['error_child_age'] = $error_child_age;}
            if($error_child_gender != 1){$error['error_child_gender'] = $error_child_gender;}
            if($error_attend != 1){$error['error_attend'] = $error_attend;}
            if($error_invitation != 1){$error['error_invitation'] = $error_invitation;}
            if($error_package != 1){$error['error_package'] = $error_package;}
            if($error_intolerance != 1){$error['error_package'] = $error_parent_name;}
            if($error_activity != 1){$error['error_intolerance'] = $error_intolerance;}
            if($error_parent_attend != 1){$error['error_parent_attend'] = $error_parent_attend;}
            if($error_parent_food != 1){$error['error_parent_food'] = $error_parent_food;}
            if($error_savoury != 1){$error['error_savoury'] = $error_savoury;}
            if($error_snack != 1){$error['error_snack'] = $error_snack;}


            $er = count($error);
            // $message = 'HELLO';

            // $user = User::find(1)->toArray();
            // echo '<pre>'; print_r($errors); echo '</pre>'; exit; 
            if($er > 0){
                $er = 1;
            }

            

            $messageData = array(
                'parent_name' => $input['parent_name'],
                'mobile' => $input['mobile'],
                'email' => $input['email'],
                'date' => $input['date'],
                'child_name' => $input['child_name'],
                'child_age' => $input['child_age'],
                'child_gender' => $input['child_gender'],
                'attend' => $input['attend'],
                'invitation' => $input['invitation'],
                'package' => $package,
                'intolerance' => $input['intolerance'],
                'activity' => $activity,
                'parent_attend' => $input['parent_attend'],
                'parent_food' => $input['parent_food'],
                'snack' => $snack,
                'savoury' => $savoury,
                'errors' => $er,
            );


            // echo '<pre>'; print_r($er); echo '</pre>'; exit; 




            $messageD = $messageData + $error;
            $e = $input['email'];
            $emails = ['eat@fedupproject.com.au', $e];
            // $emails = ['myoneemail@esomething.com', 'myother@esomething.com','myother2@esomething.com'];

            // if(isset($messageD['error_parent_food'])){
            //     echo '<pre>'; print_r($messageD['error_parent_food']); echo '</pre>'; exit; 
            // }
            // echo '<pre>'; print_r($messageD); echo '</pre>'; exit; 

            Mail::send('emails.basicmail', $messageD, function($message) use ($messageD, $input, $emails, $er) {
                $message->to($emails)->subject('Fed Up Project Party');
            });

            // dd('Mail Send Successfully');

        }

        // echo '<pre>'; print_r($input); echo '</pre>'; exit; 

        $me = 'A copy email was sent to: '. $input['email'];
        $do = 'We will respond in 48 hours to confirm everything';

        return View::make('public.kids')
        ->with(array(
            'no_message' => 0,
            'no_post' => 0,
            'message' => $me,
            'message2' => $do,
        ));
    }
} 