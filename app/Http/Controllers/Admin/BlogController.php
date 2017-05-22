<?php

namespace App\Http\Controllers\Admin;

use View;
use Input;
use Auth;
use App\User;
use App\Models\Post;
use App\Models\Images;
use App\Models\Text;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient; 
use App\Models\RecipePackagings; 
use App\Models\Packaging; 
use Validator;
use DispatchesCommands, ValidatesRequests;
// use App\Http\Requests\Requests;
// use Illuminate\Http\Requests\Request;
// use App\Http\Requests;
use App\Http\Requests\ValidBlogRequest;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
// use View;
 
class BlogController extends BaseController{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts(){

        $blog_posts = Post::orderBy('post_name','ASC')->where('topic','=', 'blog')->where('active','!=', 9)->get();

        return View::make('admin.blog')
        ->with(array(
            'blog_posts' => $blog_posts,
        ));
    }

    public function getMenu(){

        $blog_posts = Post::orderBy('post_name','ASC')->where('topic','=', 'menu')->where('active','!=', 9)->get();

        return View::make('admin.menu')
        ->with(array(
            'blog_posts' => $blog_posts,
        ));
    }

    public function getEvent(){

        $blog_posts = Post::orderBy('post_name','ASC')->where('topic','=', 'event')->where('active','!=', 9)->get();

        return View::make('admin.event')
        ->with(array(
            'blog_posts' => $blog_posts,
        ));
    }

    public function getCatering(){

        $blog_posts = Post::orderBy('post_name','ASC')->where('topic','=', 'catering')->where('active','!=', 9)->get();

        return View::make('admin.catering')
        ->with(array(
            'blog_posts' => $blog_posts,
        ));
    }

    public function getCake(){

        $blog_posts = Post::orderBy('post_name','ASC')->where('topic','=', 'cake')->where('active','!=', 9)->get();

        return View::make('admin.cake')
        ->with(array(
            'blog_posts' => $blog_posts,
        ));
    }

    public function getProject(){

        $blog_posts = Post::orderBy('post_name','ASC')->where('topic','=', 'project')->where('active','!=', 9)->get();

        return View::make('admin.project')
        ->with(array(
            'blog_posts' => $blog_posts,
        ));
    }

    public function getAddPosts(){
            $no_post = 1;       
        return View::make('admin.post_form')
        ->with(array(
            'no_post' => $no_post,
            'preview' => 0,
        )); 
    }

    public function postAddPosts(){
        $input = Input::all();

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
            $post = new Post();

            $post->post_name     = $input['name'];
            $post->author        = Auth::user()->name;
            $post->read_time     = $input['read_time'];
            $post->video_link     = $input['video_link'];
            $post->blurb     = $input['promo_blurb'];
            $post->topic     = $input['topic'];
            $post->active        = isset($input['active']) ? 1: 0;

            if($post->save()){
                
                if($input['url'] != null){
                // echo '<pre>'; print_r($input['url']); echo '</pre>'; exit;
                    $str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $input['url']);
                    $url = preg_replace('/\s+/', '-', $str); 
                    // echo '<pre>'; print_r($post->url); echo '</pre>'; exit;
                    $post->url = $url;
                    // echo '<pre>'; print_r($post); echo '</pre>'; exit; 
                }elseif($input['name'] != null){
                    $str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $input['name']);
                    $url = preg_replace('/\s+/', '-', $str); 
                    $post->url = $url;
                }else{
                    // echo '<pre>'; print_r($post->id); echo '</pre>'; exit;
                    $post->url = $post->id;
                }
                if($input['hashtag'] != null){
                    
                    // $str = preg_replace("/[^a-z0-9 ]/", ' ', $input['hashtag']);
                    $lwr = strtolower($input['hashtag']);
                    $str = preg_replace("/[^a-z0-9 ]/", ' ', $lwr);
                    
                    $tag = preg_replace('/\s+/', '', $str); 
                    // echo '<pre>'; print_r($tag); echo '</pre>'; exit;
                    // echo '<pre>'; print_r($post->url); echo '</pre>'; exit;
                    $post->hashtag = $tag;
                    // echo '<pre>'; print_r($post); echo '</pre>'; exit; 
                }else{
                    $post->hashtag = 'getfedup';
                }
            
                $post->save();
                    // echo '<pre>'; print_r($post->images); echo '</pre>'; exit;
                if(isset($input['text'])){
                    $t_count = count($input['text']);
                    $t = 0;
                    $ordering = 1;
                    $i_text_id = 'lose';
                    foreach($input['text'] as $section){
                        if($t <= $t_count){
                            
                            foreach($section as $i_text=>$text){
                                if($i_text == 'tx'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['tx'];
                                    $_text->link_id = $post->id;
                                    $_text->section = 'TEXT';
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                
                                }elseif($i_text == 'hx'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['hx'];
                                    $_text->link_id = $post->id;
                                    $_text->section = 'HEADER';
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                }elseif($i_text == 'px'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['px'];
                                    $_text->link_id = $post->id;
                                    $_text->section = 'PROMO';
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                }elseif($i_text == 'lx'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['lx'];
                                    $_text->link_id = $post->id;
                                    $_text->section = 'LINK';
                                    $_text->link = $input['text'][$t+1]['lxx'];
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                }elseif($i_text == 'lxx'){
                                    $ordering--;
                                }else{
                                        
                                        if($i_text_id == $i_text){
                                            $_text = Text::find($i_text);
                                            $_text->link = $input['text'][$t][$i_text];

                                            $i_text_id = $i_text;
                                            $ordering--;
                                        }else{
                                            $_text = Text::find($i_text);
                                            $_text->description = $input['text'][$t][$i_text];
                                            $_text->link_id = $post->id;
                                            // $_text->section = 'HEADER';
                                            $_text->link = $input['text'][$t][$i_text];
                                            $_text->ordering = $ordering;
                                            $_text->active = 1;

                                            $i_text_id = $i_text;  
                                        }

                                    if(isset($input['ddt'])){
                                        $ddt = $input['ddt'];

                                        foreach($ddt as $delete){
                                            if($delete == $_text->id){
                                                $_text->ordering = 0;
                                                $_text->active = 9;

                                                $ordering--;
                                            }
                                        };
                                    };
                                };
                                
                                $post->Text()->save($_text);

                                $ordering++;

                            };                            
                        $t++;
                        };
                    };
                };
            };
        }


        // $post = Post::find($post_id);

        return redirect()->action('Admin\BlogController@getEditPosts', [$post->id]);

    }

    public function getEditPosts($id){
        $post = Post::find($id);

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

        $promo_posts = Post::orderBy('created_at', 'ASC')->where('active', '=', 1)->get();
        $ppost_3 = 0;
        $ppost_array = array();
         // $ppost_array = new stdClass();
   // $object->property = 'Here we go';

   // var_dump($object);
        foreach ($promo_posts as $ppost) {
           $pcount = count($ppost->images);
           if($ppost_3 <= 2){
                 // echo '<pre>'; print_r($ppost->id); echo '</pre>'; exit;
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
                        );
                       // echo '<hr/>'; 
                       // $ppost_array->post = $ppost;
                       $ppost_3 ++;
                    }
                }
            }
        }
        
        if(empty($post->video_link)){
            // echo '<pre>'; print_r($post->video_link); echo '</pre>'; exit;
            $no_video = 1;
        }else{
            $no_video = 0;
        }

        $images = $post->images;
        $image_count = count($images);
        $text_check = $post->Text;
        $text_count = count($text_check);
        $vertical_image = 0;
        $header_image = 0;
        $background_image = 0;

        if($text_count == 0){
            $post_array = 'luke';   
        }else{
            $post_array = array();
        }

        $background_image = "no_background_image";

        if($image_count != 0){
            foreach ($images as $key => $image) {
            
                if($image->type == 1){
                    $background_image = $image;
                }elseif($image->type == 0){
                    $vertical_image = $image;
                }
            }  
        }else{
            $background_image = "no_background_image";
        }

        // echo '<pre>'; print_r($background_image); echo '</pre>'; exit;

        $post_array = array();
        if($text_count != 0){
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

        return View::make('admin.post_form')
        ->with(array(
            // 'recipe' => $recipe,
            // 'no_recipe' => $no_recipe,
            // 'iArray' => $iArray,
            // 'mArray' => $metric,
            // 'ingredients' => $ingredients,
            // 'iMetric' => $hArray,
            // 'ipArray' => $hpArray,
            // 'pArray' => $pArray,

            'image_count' => $image_count, 
            'text_count' => $text_count,
            'post' => $post,
            'ppost_array' => $ppost_array,
            'no_post' => $no_post,
            'text' => $text,
            'post_array' => $post_array,
            'header_image' => $header_image,
            'vertical_image' => $vertical_image,
            'background_image' => $background_image,
            'preview' => 0,
            'no_video' => $no_video,
        )); 
        
        
    }

    public function postUpdatePosts(ValidBlogRequest $request){  
    // public function postUpdatePosts(){
        $input = Input::all();

        if ($input === null) {
             // return Re
            // return redirect::back()->withErrors($Validator->errors)->withInput($input);
        
        }else{

            $post = Post::where('id', '=', $input['id'])->first();
            
            $old_topic = $post->topic;

            $post_id = $input['id'];
            $post->post_name     = $input['name'];
            $post->author        = Auth::user()->name;
            $post->read_time     = $input['read_time'];
            $post->video_link     = $input['video_link'];
            $post->blurb     = $input['promo_blurb'];
            $post->topic = $topic = $input['topic'];
            // 
            if($input['url'] != null){
                // echo '<pre>'; print_r($input['url']); echo '</pre>'; exit;
                $str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $input['url']);
                $url = preg_replace('/\s+/', '-', $str); 
                // echo '<pre>'; print_r($post->url); echo '</pre>'; exit;
                $post->url = $url;
                // echo '<pre>'; print_r($post); echo '</pre>'; exit; 
            }elseif($input['name'] != null){
                $str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $input['name']);
                $url = preg_replace('/\s+/', '-', $str); 
                $post->url = $url;
            }else{
                $post->url = $post_id;
            }

            if($input['hashtag'] != null){
                
                // $str = preg_replace("/[^a-z0-9 ]/", ' ', $input['hashtag']);
                $lwr = strtolower($input['hashtag']);
                $str = preg_replace("/[^a-z0-9 ]/", ' ', $lwr);
                
                $tag = preg_replace('/\s+/', '', $str); 
                // echo '<pre>'; print_r($tag); echo '</pre>'; exit;
                // echo '<pre>'; print_r($post->url); echo '</pre>'; exit;
                $post->hashtag = $tag;
                 
            }else{
                $post->hashtag = 'getfedup';
            }



            // if(isset($input['active']) != null){ $post->active = 1; }else{ $post->active = 0; }
            $count_images = count($post->Images);

            // echo '<pre>'; print_r($count_images); echo '</pre>'; exit;

            if($count_images >= 2){





                if(isset($input['hp_promote']) != null || isset($input['hook']) != null){ 

                    
                    if(isset($input['hook']) != null){
                        // echo '<pre>'; print_r($input); echo '</pre>'; exit;
                        $current_hp_promo = Post::orderBy('created_at', 'ASC')->where('hp_promote', '=', 1)->first();
                        $hp_count = count($current_hp_promo); 
                        if($hp_count == 1){
                            $current_hp_promo->hp_promote = 0; 
                            $current_hp_promo->save();   
                        }
                        $post->hp_promote = 1;
                        $post->active = 1;
                        $post->hook = $input['hook'];
                    }else{
                        $post->hp_promote = 0; 
                    }
                    
                    
                }else{ 
                    $post->hp_promote = 0; 
                }
                

                // echo '<pre>'; print_r($topic); echo '</pre>'; 
                // echo '<pre>'; print_r($old_topic); echo '</pre>'; exit;

                if($old_topic == $topic){
                    $current_promo = Post::orderBy('created_at', 'ASC')->where('topic', '=', $old_topic)->where('promote', '=', 1)->first();
                    // echo '<pre>'; print_r($current_promo); echo '</pre>'; exit;
                    if($current_promo != null){
                        // echo '<pre>'; print_r($current_promo); echo '</pre>'; exit;
                        if($current_promo->id != $post->id){
                            

                            if(isset($input['promote'])){
                                if($input['promote'] == 1){
                                    $current_promo->promote = 0;
                                    $post->promote = 1;
                                    $post->active = 1;
                                    $current_promo->save();   
                                }  
                                // echo '<pre>ctt'; print_r($current_promo); echo '</pre>'; exit; 
                            }else{
                                

                                $current_topics = Post::orderBy('created_at', 'ASC')->where('topic', '=', $old_topic)->where('active', '=', 1)->get(); 
                                $count_ct = count($current_topics);       
                                $x1 = 0;
                                $cc = 1;
                                foreach ($current_topics as $ctt) {
                                    if($x1 == 0){
                                        // $ctt->promote = 1;
                                        // $post->promote = 0;
                                        $p = 1;
                                        $x1 = 1; 
                                        
                                        
                                    }
                                    // echo '<pre>ctt'; print_r($ctt->post_name); echo '</pre>';
                                    $ctt->ordering = $cc;
                                    $ctt->save();
                                    $cc++;
                                }  
                                
                            }
                            // exit;
                            
                        }else{

                            if(!isset($input['promote'])){
                                
                                $current_topics = Post::orderBy('created_at', 'ASC')->where('topic', '=', $topic)->where('active', '=', 1)->get(); 
                                // echo '<pre>current_topics'; print_r($current_topics); echo '</pre>';exit;
                                $count_ct = count($current_topics);       
                                $x1 = 0;
                                $cc = 1;
                                foreach ($current_topics as $ctt) {
                                    if($x1 == 0){
                                        $ctt->promote = 1;
                                        $p = 1;
                                        $x1 = 1; 
                                        
                                       
                                    }
                                    
                                    if ($ctt->promote == 1 && $ctt->id == $post_id) {

                                        if($ctt->promote == 1 && $x1 == 1){
                                            $ctt->promote = 1;  
                                            // $post->promote = 0;
                                            $x1 = 2;
                                            // echo '<pre>in '; print_r($ctt->post_name); echo '</pre>';
                                        }else{
                                            $ctt->promote = 0; 
                                            
                                        }
                                        // echo '<pre>'; print_r($ctt->post_name); echo '</pre>'; 
                                        // echo '<pre>'; print_r($ctt->promote); echo '</pre>'; 
                                        // echo '<pre>'; print_r($x1); echo '</pre>'; 
                                        
                                    }elseif($ctt->promote == 1 && $ctt->id != $post_id){
                                        $x1 = 2;
                                        // echo '<pre>'; print_r($ctt->post_name); echo '</pre>'; 
                                        // echo '<pre>'; print_r($ctt->promote); echo '</pre>'; 
                                        // echo '<pre>'; print_r($x1); echo '</pre>'; exit;
                                    }
                                    // echo '<pre>'; print_r($ctt->post_name); echo '</pre>'; 
                                    //     echo '<pre>'; print_r($ctt->promote); echo '</pre>'; 
                                    //     echo '<pre>'; print_r($x1); echo '</pre>'; 
                                    // exit;
                                    $ctt->ordering = $cc;
                                    $ctt->save();
                                    $cc++;
                                }  
                                // exit;                                   
                            } 
                        }   
                    }else{
                        $post->promote = 1;
                                    $post->active = 1;
                    }
                    

                }else{
                    
                    if (Post::orderBy('created_at', 'ASC')->where('topic', '=', $topic)->where('promote', '=', 1)->exists()) {
                        $current_promo = Post::orderBy('created_at', 'ASC')->where('topic', '=', $topic)->where('promote', '=', 1)->first();
                        // echo '<pre>ctt'; print_r($current_promo); echo '</pre>'; exit; 
                        if(isset($input['promote'])){
                            if($input['promote'] == 1){
                                $current_promo->promote = 0;
                                $post->promote = 1;
                                $post->active = 1;
                                $current_promo->save();   
                            }  
                            // echo '<pre>ctt'; print_r($current_promo); echo '</pre>'; exit; 
                        }else{
                            

                            $current_topics = Post::orderBy('created_at', 'ASC')->where('topic', '=', $old_topic)->where('active', '=', 1)->get();

                            $count_ct = count($current_topics);
                            
                            $p = 0;
                            $x = 1;
                            $r = 0;
                            $cc = 1;
                            foreach ($current_topics as $ct) {
                                    if($p == 1){
                                        
                                        $ct->promote = 1;
                                        $p = 0;
                                        
                                    }
                                    if($ct->promote == 1){
                                        if($ct->id == $post->id){
                                            $ct->promote = 0;
                                            $p = 1;
                                            $r = 99;
                                        }
                                        if($count_ct == $x){
                                            
                                            
                                            $x1 = 0;
                                            foreach ($current_topics as $ctt) {
                                                if($x1 == 0){
                                                    $ctt->promote = 1;
                                                    $p = 1;
                                                    $x1 = 1; 
                                                    $ctt->save();
                                                }
                                            }
                                        }
                                    }
                                $ct->ordering = $cc;
                                $ct->save();
                                $r++;
                                $x ++;
                                $cc++;
                            }                    
                            
                        }
                    }else{
                        $post->promote = 1;
                        $post->active = 1;
                        // echo 'Outside';exit; 
                    }
                   
                }

            }
            
            
            // $post->save();
            
            
            
            if($post->save()){
                // echo '<pre>'; print_r($post); echo '</pre>';exit; 
                if(isset($input['text'])){
                    $t_count = count($input['text']);
                    $t = 0;
                    $ordering = 1;
                    $i_text_id = 'lose';
                    foreach($input['text'] as $section){
                        if($t <= $t_count){
                            
                            foreach($section as $i_text=>$text){
                                if($i_text == 'tx'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['tx'];
                                    $_text->link_id = $input['id'];
                                    $_text->section = 'TEXT';
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                
                                }elseif($i_text == 'hx'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['hx'];
                                    $_text->link_id = $input['id'];
                                    $_text->section = 'HEADER';
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                }elseif($i_text == 'px'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['px'];
                                    $_text->link_id = $input['id'];
                                    $_text->section = 'PROMO';
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                }elseif($i_text == 'lx'){
                                    $_text = new Text();
                                    $_text->description = $input['text'][$t]['lx'];
                                    $_text->link_id = $input['id'];
                                    $_text->section = 'LINK';
                                    $_text->link = $input['text'][$t+1]['lxx'];
                                    $_text->ordering = $ordering;
                                    $_text->active = 1;
                                }elseif($i_text == 'lxx'){
                                    $ordering--;
                                }else{
                                        
                                        if($i_text_id == $i_text){
                                            $_text = Text::find($i_text);
                                            $_text->link = $input['text'][$t][$i_text];

                                            $i_text_id = $i_text;
                                            $ordering--;
                                        }else{
                                            $_text = Text::find($i_text);
                                            $_text->description = $input['text'][$t][$i_text];
                                            $_text->link_id = $input['id'];
                                            // $_text->section = 'HEADER';
                                            $_text->link = $input['text'][$t][$i_text];
                                            $_text->ordering = $ordering;
                                            $_text->active = 1;

                                            $i_text_id = $i_text;  
                                        }

                                    if(isset($input['ddt'])){
                                        $ddt = $input['ddt'];

                                        foreach($ddt as $delete){
                                            if($delete == $_text->id){
                                                $_text->ordering = 0;
                                                $_text->active = 9;

                                                $ordering--;
                                            }
                                        };
                                    };
                                };
                                
                                $post->Text()->save($_text);

                                $ordering++;

                            };                            
                        $t++;
                        };
                    };
                };
            };
        };


        $post = Post::find($post_id);

        $promo_posts = Post::orderBy('created_at', 'ASC')->where('active', '=', 1)->get();
        $ppost_3 = 0;
        $ppost_array = array();
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
                        );
                       // echo '<hr/>'; 
                       // $ppost_array->post = $ppost;
                       $ppost_3 ++;
                    }
                }
            }
        }


        // echo '<pre>'; print_r($ppost_array); echo '</pre>'; exit;  

        $images = $post->images;
        $image_count = count($images);
        $text_check = $post->Text;
        $text_count = count($text_check);

        if($text_count == 0){
            $post_array = 'luke';   
        }else{
            $post_array = array();
        }

        if($image_count != 0){
            foreach ($images as $key => $image) {
            
                if($image->type == 1){
                    $background_image = $image;
                }
            }  
        }else{
            $background_image = "no_background_image";
        }

        // $post_array = array();
        if($text_count != 0){
            foreach ($post->Text as $key => $text) {
            
                if($text === null){

                }elseif($text->active == 9){

                }else{
                    $post_array[$text->id] = array(
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

        if($input['submit'] == 'Refresh'){
            return View::make('admin.post_form')
            ->with(array(

                'post' => $post,
                'ppost_array' => $ppost_array,
                'no_post' => $no_post,
                'text' => $text,
                'post_array' => $post_array,
                'background_image' => $background_image,
                'preview' => 1,
                'image_count' => $image_count,
                'text_count' => $text_count,
                'no_video' => $no_video,

                'message' => "Great Work",
            )); 
        }else{
            return View::make('admin.post_form')
            ->with(array(

                'post' => $post,
                'ppost_array' => $ppost_array,
                'no_post' => $no_post,
                'text' => $text,
                'post_array' => $post_array,
                'background_image' => $background_image,
                'preview' => 0,
                'image_count' => $image_count,
                'text_count' => $text_count,
                'no_video' => $no_video,

                'message' => "Great Work",
            )); 
        }
    }

    public function getDeletePosts($id){
        $post = Post::find($id);
        $post->active = 9;
        $post->save();

        return redirect('/admin/blog');
    }

    public function getActivePosts($id){
        $post = Post::find($id);
        $post->active = ($post->active == 1 )? 0 : 1;
        $post->save();

        return redirect('/admin/blog');
    }



} 






























///////////////////////////////////////////////////////////////////////////




        // $post = Post::find($id);
        // $post_array = array();
        // foreach ($post->Text as $key => $text) {
        //     if($text->active == 9){

        //     }else{
        //         $post_array[$text->id]  = array(
        //             'description' => $text->description,
        //             'section' => $text->section,
        //             'link' => $text->link,
        //             'ordering' => $text->ordering,
        //             'active' => $text->active,
        //         );
        //     }
            
        // }      

        // $images = $post->images;
        // foreach ($images as $key => $image) {
            
        //     if($image->ordering == 0){
        //         $background_image = $image;
        //     }
        // } 

        // if($post === null){
        //     $no_post = 1;
        // }else{
        //     $no_post = 0;
        // }

        // return View::make('admin.post_form')
        // ->with(array(
        //     'post' => $post,
        //     'no_post' => $no_post,
        //     'text' => $text,
        //     'post_array' => $post_array,
        //     'background_image' => $background_image,
        //     'preview' => 0,
        // )); 
        
   