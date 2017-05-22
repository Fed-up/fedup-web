<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
 
// public function forbiddenResponse(){
//     return Response::make(view('errors.403'), 403);
// }

Route::get('/', 'Front\PublicController@getHomePage');

Route::get('healthy-dessert-bar', 'Front\PublicController@getDessert');
Route::get('start-a-kids-birthday-party', 'Front\PublicController@getKids');
Route::post('start-a-kids-birthday-party', 'Front\PublicController@postKids');

// Route::get('/getfedup', 'Front\PublicController@getBlog');
Route::get('/getfedup/{link}', 'Front\PublicController@getURL');
Route::get('/getfedup/tag/{hashtag}', 'Front\PublicController@getHashtag');
Route::get('/eventmenu', 'Front\PublicController@getMenu');  
Route::get('/cafeinfo', 'Front\PublicController@getCafeInfo');
// Route::get('/test', 'Front\PublicController@getTest');
// Route::get('/test1', 'Front\PublicController@getTest1');
// Route::get('/test2', 'Front\PublicController@getTest2');
// Route::get('/test3', 'Front\PublicController@getTest3');
// Route::get('/test4', 'Front\PublicController@getTest4');
// Route::get('/test5', 'Front\PublicController@getTest5');
// Route::get('/test6', 'Front\PublicController@getTest6');

Route::get('/discover', 'Front\PublicController@getDash');
Route::get('/blog', 'Front\PublicController@getBlog');
Route::get('/menu', 'Front\PublicController@getMenu');
Route::get('/project', 'Front\PublicController@getProject');
Route::get('/cakes', 'Front\PublicController@getCake');
Route::get('/events', 'Front\PublicController@getEvent');
Route::get('/catering', 'Front\PublicController@getCatering');


Route::get('/location', 'Front\PublicController@getLocation');

Route::get('/book-table', 'Front\PublicController@getBookTable');
Route::post('/book-table', 'Front\PublicController@postBookTable');



// Route::get('/valid', 'Front\ValidController@getValid');
// Route::post('/valid', 'Front\ValidController@postValid');





Route::get('/admin', function () {
    return view('auth.index');
});


Route::group(['middleware' => 'web'], function () {
	//Login Routes...
    Route::get('login','Auth\AuthController@showLoginForm');
    Route::post('login','Auth\AuthController@login');
    Route::get('logout','Auth\AuthController@logout');

   

    // Auth Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register'); 
   

    // Route::get('admin/recipes', 'Admin\RecipeController@getRecipes');
    // Route::get('admin/recipes/add', 'Admin\RecipeController@getAddRecipes');
    // Route::post('admin/recipes/add', 'Admin\RecipeController@postAddRecipes');
    // Route::get('admin/recipes/edit/{id}', 'Admin\RecipeController@getEditRecipes');
    // Route::post('admin/recipes/edit', 'Admin\RecipeController@postUpdateRecipes');
    // Route::get('admin/recipes/delete/{id}', 'Admin\RecipeController@getDeleteRecipes');

    // Route::get('admin/ingredients', 'Admin\IngredientController@getIngredients');
    // Route::get('admin/ingredients/add', 'Admin\IngredientController@getAddIngredients');
    // Route::post('admin/ingredients/add', 'Admin\IngredientController@postAddIngredients');
    // Route::get('admin/ingredients/edit/{id}', 'Admin\IngredientController@getEditIngredients');
    // Route::post('admin/ingredients/edit', 'Admin\IngredientController@postUpdateIngredients');
    // Route::get('admin/ingredients/delete/{id}', 'Admin\IngredientController@getDeleteIngredients');

    // Route::get('admin/packaging', 'Admin\PackagingController@getPackaging');
    // Route::get('admin/packaging/add', 'Admin\PackagingController@getAddPackaging');
    // Route::post('admin/packaging/add', 'Admin\PackagingController@postAddPackaging');
    // Route::get('admin/packaging/edit/{id}', 'Admin\PackagingController@getEditPackaging');
    // Route::post('admin/packaging/edit/', 'Admin\PackagingController@postUpdatePackaging');
    // Route::get('admin/packaging/delete/{id}', 'Admin\PackagingController@getDeletePackaging');

    Route::get('admin/menu', 'Admin\BlogController@getMenu');
    Route::get('admin/project', 'Admin\BlogController@getProject');
    Route::get('admin/cake', 'Admin\BlogController@getCake');
    Route::get('admin/catering', 'Admin\BlogController@getCatering');
    Route::get('admin/event', 'Admin\BlogController@getEvent');

    Route::get('admin/blog', 'Admin\BlogController@getPosts');
    Route::get('admin/post/add', 'Admin\BlogController@getAddPosts');
    Route::post('admin/post/add', 'Admin\BlogController@postAddPosts');
    Route::get('admin/post/edit/{id}', 'Admin\BlogController@getEditPosts');
    Route::post('admin/post/edit', 'Admin\BlogController@postUpdatePosts');
    Route::get('admin/post/delete/{id}', 'Admin\BlogController@getDeletePosts');
    Route::get('admin/post/active/{id}', 'Admin\BlogController@getActivePosts');

    Route::get('admin/website', 'Admin\BlogController@getWebsite');
    Route::post('admin/website', 'Admin\BlogController@postWebsite');


    Route::get('admin/metrics', 'Admin\MetricController@getMetric');

    Route::get('admin/test', 'Admin\IngredientController@getTest');

    Route::post('admin/image-upload-desktop', 'HomeController@postImageUpload');
    Route::post('admin/image-upload-vertical', 'HomeController@postImageVerticalUpload');
    Route::get('admin/image-delete/{id}', 'HomeController@getImageDelete');


    // Route::get('admin/test7', 'HomeController@getTest7');

    // Route::post('admin/single-upload', 'HomeController@postTest7');
    
    // Route::get('admin', 'Auth\AuthController@mini');

	// Route::get('admin', function(){
	// 	$recipe = App\Models\Recipe::find(1);
	// 	echo '<pre>';
	// 	print_r($recipe);  
	// });
});

 Route::get('admin/profile', 'Admin\ProfileController@getProfile');   
 Route::post('admin/profile', 'Admin\ProfileController@postUpdateProfile');  

 Route::get('/{link}', 'Front\PublicController@getURLs');
	

// Route::group(['middleware' => 'auth'], function () {
//     Route::auth();s
	

// });
// Route::auth();

// Route::get('admin', 'HomeController@admin');postImageUpload



// Route::get('/home', 'HomeController@index');

// Route::get('/user', 'HomeController@user');




// Route::get('/admin', 'HomeController@admin');

