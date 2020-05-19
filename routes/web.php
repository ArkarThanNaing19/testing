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
*/

Route::get('/', 'Controller@home');

Route::get('/test','Controller@test');

Route::post('/form','Controller@form');

Route::get('/eloquent',

	function(){

		$flight = flights::all();
    }

);

Route::get('form-validation', 'HomeController@formValidation');
Route::post('form-validation', 'HomeController@formValidationPost');


Route::get('form-vali', 'HomeController@formVali');


Route::get('items/add', 'ItemController@create');

Route::post('items/add', 'ItemController@store');


////

Route::get('ajax-crud','AjaxController@ajax');

Route::get('ajax_create','AjaxController@ajax_create');

//Eloquent Demo

Route::get('demo','Controller@demo');

Route::post('add','Controller@add_demo');

Route::get('list','Controller@list');

Route::get('edit/{id}','Controller@edit');

Route::get('del/{id}','Controller@del');

Route::post('update/{id}','Controller@update');

Route::get('test','Controller@test_1');


///// Test /


Route::get('/t', function()
{
     return View::make('simple');
});

// Route::get('/{id}', function($some)
// {
//     $data['squirrels'] = $some;
//
//     return View::make('simple', $data);
// });

Route::get('first', function()
{
    return Redirect::to('second');
});

Route::get('second', function()
{
    dd('hello');
});

Route::get('books', function()
{
    if (Auth::guest()) return Redirect::to('login');

    // Show books to only logged in users.
});

Route::get('login',function()
{
	return view('simple');
});

Route::get('custom/response', function()
{
    $response = Response::make('Hello world!', 200);
    $response->headers->set('our key', 'our value');
    return $response;
});

Route::get('markdown/response', function()
{
	$data = array('iron', 'man', 'rocks');
    return Response::json($data);

		// $file = 'path_to_my_file.pdf';
	 // return Response::download($file);
});

//Ajax test
Route::get('ajax_test',function(){
   return view('ajax_test');
});
Route::post('demo-test','AjaxTestController@index');
Route::get('demo-test','AjaxTestController@index');

Route::get('/testing1','AjaxTestController@testing');


//
Route::get('my-posts', 'PostController@myPosts');
Route::resource('posts','PostController');

//

Route::post('form_test','Controller@testing1');

Route::get('delete','Controller@delete')->name('posts');
Route::delete('/posts/{id}', 'Controller@destroy')->name('post-delete');
Route::post('/posts/{id}', 'Controller@edit_test')->name('post-edit');

//
Route::get('/foo/bar','UriController@index');

Route::get('/register',function(){
   return view('register');
});

Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));

///

Route::get('/withheader',function(){
    return response('Hello World',200)->header('Content Type','text/html');
});

Auth::routes(['register' => false ]);

Route::get('/home', 'HomeController@index')->name('home');

// Boot Testing

Route::get('articles','ArticleController@index')->name('articles.index');
Route::get('articles/add','ArticleController@add')->name('articles.add');
Route::post('articles/add','ArticleController@create');
Route::get('articles/detail/{id}','ArticleController@show')->name('articles.detail');
Route::get('articles/delete/{id}','ArticleController@destroy');
