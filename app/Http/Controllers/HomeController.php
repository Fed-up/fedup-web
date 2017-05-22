<?php

namespace App\Http\Controllers;

use View;
use App\User;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
class HomeController extends Controller
{
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
    public function index()
    {
        return view('home');
    }

    // public function admin()
    // {
    //     return view('auth.index');
    // }

    public function user(){
        echo "User"; exit;
        $user = User::find(1);
        echo $user;
        exit;
        return view('auth.index');
    }

    public function admin(){
        // echo "Admin"; exit;
        // $user = User::orderBy('id', 'asc')->get();
        // echo $user;
        // exit;
        return view('auth.index');
    }


    public function postImageUpload(Request $request){
        //Get file from post request

        // echo "Image Upload"; exit;

        $file = $request->file('file');
        
        //Set File Name
        $filename = uniqid() . $file->getClientOriginalName();
        
        //Move file to location
        // if (!file_exists('/images/uploads')){
        //     mkdir('/images/uploads', 0777, true);
        // }
        $file->move('images/uploads', $filename);

        // if (!file_exists('/images/uploads/small')){
        //     mkdir('/images/uploads/small', 0777, true);
        // }
        $small = Image::make('images/uploads/' .$filename)->resize(400, 234)->save('images/uploads/small/' .$filename, 60);
        // if (!file_exists('/images/uploads/medium')){
        //     mkdir('/images/uploads/medium', 0777, true);
        // }
        $medium = Image::make('images/uploads/' .$filename)->resize(700, 366)->save('images/uploads/medium/' .$filename, 80);
        // if (!file_exists('/images/uploads/large')){
        //     mkdir('/images/uploads/large', 0777, true);
        // }
        $large = Image::make('images/uploads/' .$filename)->resize(1200, 628)->save('images/uploads/large/' .$filename, 100);

        // $phone = Image::make('images/uploads/' .$filename)->resize(750, 1334)->save('images/uploads/phone/' .$filename, 100); 

        //Save image to database
        $post = Post::find($request->Input('post_id'));
        $images = $post->images;
        $i_order = 1;
        foreach ($images as $key => $i) {
            $i->ordering = $i_order;
            
            $i->save(); 
            $i_order++; 
        }
        
        $image = $post->images()->create([
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => '/images/uploads/' . $filename,
            'type' => 1,
            'link_id' => $request->input('post_id'),
            'ordering' => $i_order,

        ]);
     
        // echo '<pre>'; print_r($vimage); echo '</pre>'; exit;
        //Append id to $image to catch if someone clicked on the image button
         
        return $image;

    }

    public function postImageVerticalUpload(Request $request){
        //Get file from post request

        // echo "Image Upload"; exit;

        $file = $request->file('file');
        
        //Set File Name
        $filename = uniqid() . $file->getClientOriginalName();
        
        //Move file to location
        // if (!file_exists('/images/uploads')){
        //     mkdir('/images/uploads', 0777, true);
        // }
        $file->move('images/uploads', $filename);

        // if (!file_exists('/images/uploads/small')){
        //     mkdir('/images/uploads/small', 0777, true);


        $psmall = Image::make('images/uploads/' .$filename)->resize(281, 500)->save('images/uploads/phone/small/' .$filename, 60);
        // if (!file_exists('/images/uploads/medium')){
        //     mkdir('/images/uploads/medium', 0777, true);
        // }
        $pmedium = Image::make('images/uploads/' .$filename)->resize(675, 1200)->save('images/uploads/phone/medium/' .$filename, 80);
        // if (!file_exists('/images/uploads/large')){
        //     mkdir('/images/uploads/large', 0777, true);
        // }
        $plarge = Image::make('images/uploads/' .$filename)->resize(1080, 1920)->save('images/uploads/phone/large/' .$filename, 90);

        // $phone = Image::make('images/uploads/' .$filename)->resize(750, 1334)->save('images/uploads/phone/' .$filename, 100); 

        //Save image to database
        $post = Post::find($request->Input('post_id'));
        $images = $post->images;
        $i_order = 1;
        foreach ($images as $key => $i) {
            $i->ordering = $i_order;
            
            $i->save(); 
            $i_order++; 
        }
        
        $image = $post->images()->create([
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => '/images/uploads/phone/' . $filename,
            'type' => 0,
            'link_id' => $request->input('post_id'),
            'ordering' => $i_order,

        ]);

        // $image->save(); 
        //echo "<script>console.log("TOM!")</script>";
        //echo '<pre>v'; print_r($vimage); echo '</pre>'; exit;
        //Append id to $image to catch if someone clicked on the image button
         
        return $image;

    }

    public function getImageDelete($id){

        

        $image = Images::findOrFail($id);
        $link_id = $image->link_id;

        // unlink($image->file_path);
        if($image->type == 1){
            unlink('images/uploads/small/' . $image->file_name);
            unlink('images/uploads/medium/' . $image->file_name);
            unlink('images/uploads/large/' . $image->file_name);   
        }else{
            unlink('images/uploads/phone/small/' . $image->file_name);
            unlink('images/uploads/phone/medium/' . $image->file_name);
            unlink('images/uploads/phone/large/' . $image->file_name); 
        }
        

        // unlink('images/uploads/phone/' . $image->file_name);
        $image->delete();

        $images = Images::where('link_id', '=', $link_id)->get();
        // echo '<pre>'; print_r($images); echo '</pre>'; exit;
        $image_count = count($images);

        $i_order = 1;
        foreach ($images as $key => $i) {
            // echo '<pre>O->'; print_r($i->ordering); echo '</pre>';
            if($image_count == $i_order){
                $i->ordering = 0;
            }else{
                $i->ordering = $i_order;  
            }
           
            $i->save(); 
            $i_order++; 
        };

        $promo_posts = Post::orderBy('created_at', 'ASC')->where('active', '!=', 9)->get();
        $ppost_3 = 0;
        $ppost_array = array();
         // $ppost_array = new stdClass();
   // $object->property = 'Here we go';

   // var_dump($object);
        foreach ($promo_posts as $ppost) {
           $pcount = count($ppost->images);
           if($ppost_3 <= 2){
               if ($pcount > 0) {
                    // echo '<pre>'; print_r($ppost->created_at); echo '</pre>';
                    $ppost_array[$ppost->id] = array(
                        'title' => $ppost->post_name,
                        'blurb' => $ppost->blurb,
                        'image' => $ppost->images[0]->file_name,
                    );
                   // echo '<hr/>'; 
                   // $ppost_array->post = $ppost;
                   $ppost_3 ++;
               }
            }
        }
        

        $post = Post::find($link_id);
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

        $images = $post->images;
        $image_count = count($images);
        $text_check = $post->Text;
        $text_count = count($text_check);

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
                }
            }  
        }else{
            $background_image = "no_background_image";
        }



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
            'post' => $post,
            'ppost_array' => $ppost_array,
            'no_post' => $no_post,
            'text' => $text,
            'post_array' => $post_array,
            'background_image' => $background_image,
            'preview' => 2,
            'image_count' => $image_count,
            'text_count' => $text_count,
            'no_video' => 0,
        )); 
        
    }

    public function getTest7(){
        return View::make('public.test7');
    }  

    public function postTest7()
    {
 
        // define('DB_SERVER', 'localhost');
        // define('DB_USERNAME', 'root');
        // define('DB_PASSWORD', 'root');
        // define('DB_DATABASE', 'learn');
        // $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

        if(isset($_POST) && !empty($_FILES['image']['name'])){
            
            $file = $request->file('file');
        
            //Set File Name
            $filename = uniqid() . $file->getClientOriginalName();
            
            //Move file to location
            // if (!file_exists('/images/uploads')){
            //     mkdir('/images/uploads', 0777, true);
            // }
            $file->move('images/uploads', $filename);

            // if (!file_exists('/images/uploads/small')){
            //     mkdir('/images/uploads/small', 0777, true);


            $psmall = Image::make('images/uploads/' .$filename)->resize(358, 596)->save('images/uploads/phone/small/' .$filename, 60);
            // if (!file_exists('/images/uploads/medium')){
            //     mkdir('/images/uploads/medium', 0777, true);
            // }
            $pmedium = Image::make('images/uploads/' .$filename)->resize(675, 1200)->save('images/uploads/phone/medium/' .$filename, 80);
            // if (!file_exists('/images/uploads/large')){
            //     mkdir('/images/uploads/large', 0777, true);
            // }
            $plarge = Image::make('images/uploads/' .$filename)->resize(1080, 1920)->save('images/uploads/phone/large/' .$filename, 90);

            // $phone = Image::make('images/uploads/' .$filename)->resize(750, 1334)->save('images/uploads/phone/' .$filename, 100); 

            //Save image to database
            $post = Post::find($request->Input('post_id'));
            $images = $post->images;
            $i_order = 1;
            foreach ($images as $key => $i) {
                $i->ordering = $i_order;
                
                $i->save(); 
                $i_order++; 
            }
            // echo '<pre>'; print_r($i_order); echo '</pre>'; exit;
            $vimage = $post->images()->create([
                'file_name' => $filename,
                'file_size' => $file->getClientSize(),
                'file_mime' => $file->getClientMimeType(),
                'file_path' => 'images/uploads/phone/' . $filename,
                'link_id' => $request->input('post_id'),
                'type' => 1,
                'ordering' => 0,

            ]);

            echo "<img width='200px' src='".$vimage->file_path."' class='preview'>";

        }

    }

    
    // }


} 
