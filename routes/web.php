<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   
*/  use App\Models\Post;
 	use App\Models\Category;
  	use App\Models\Comment;
    use App\Models\User;
	use Faker\Generator as Faker;
	use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login','AuthController@showLoginForm')->name('auth.showLoginForm')->middleware('check_login');
Route::post('login','AuthController@login')->name('auth.login');
Route::post('logout','AuthController@logout')->name('auth.logout');
//* User
Route::group(['middleware' => 'check_role_admin'], function() {

Route::group([
    'prefix' =>'users',
    'as' => 'users.',
   

], function() {
    Route::get('/','UserController@index')->name('index');

    Route::get('create','UserController@create')->name('create');

    Route::post('store','UserController@store')->name('store');

    Route::get('{id}/edit','UserController@edit')->name('edit');

    Route::get('{id}','UserController@show')->name('show');

    Route::post('{id}/update','UserController@update')->name('update');

    Route::post('{id}/delete','UserController@destroy')->name('delete');

});

// * Post
Route::group([
    'prefix' =>'posts',
    'as' => 'posts.',
], function() {
Route::get('/','PostController@index')->name('index');

Route::get('create','PostController@create')->name('create');

Route::post('store','PostController@store')->name('store');

Route::get('{id}/edit','PostController@edit')->name('edit');

Route::get('{id}','PostController@show')->name('show');

Route::post('{id}/update','PostController@update')->name('update');

Route::post('{id}/delete','PostController@destroy')->name('delete');
});

//* Comment

Route::group([
    'prefix' =>'comments',
    'as' => 'comments.',
], function() {
Route::get('/','CommentController@index')->name('index');

Route::get('create','CommentController@create')->name('create');

Route::post('store','CommentController@store')->name('store');

Route::get('{id}/edit','CommentController@edit')->name('edit');

Route::get('{id}','CommentController@show')->name('show');

Route::post('{id}/update','CommentController@update')->name('update');

Route::post('{id}/delete','CommentController@destroy')->name('delete');
});

//* Category

Route::group([
    'prefix' =>'categories',
    'as' => 'categories.',
], function() {
Route::get('/','CategoryController@index')->name('index');

Route::get('create','CategoryController@create')->name('create');

Route::post('store','CategoryController@store')->name('store');

Route::get('{id}/edit','CategoryController@edit')->name('edit');

Route::get('{id}','CategoryController@show')->name('show');

Route::post('{id}/update','CategoryController@update')->name('update');

Route::post('{id}/delete','CategoryController@destroy')->name('delete');
});

});



// Client
Route::group(['middleware' => 'check_logout'], function() {

    Route::group(['prefix' => 'client','as' => 'client.'], function() {

        Route::get('/','ClientController@index')->name('index');

        Route::get('/post/{id}','ClientController@singlePost')->name('singlePost');

        Route::get('/category/{id}','ClientController@PostCategory')->name('category');

        });
});
