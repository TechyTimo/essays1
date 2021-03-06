<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//the app:
Route::get('/', function(){ return View::make('index');});
Route::get('introduction', function(){ return Redirect::to('/#/introduction');});
Route::get('about-us', function(){ return Redirect::to('/#/about-us');});
Route::get('services', function(){ return Redirect::to('/#/services');});
Route::get('my-order', function(){ return Redirect::to('/#/my-order');});
Route::get('faq', function(){ return Redirect::to('/#/faq');});
Route::get('contact-us', function(){ return Redirect::to('/#/contact-us');});
Route::get('sign-up', function(){ return Redirect::to('/#/sign-up');});

//the api:
Route::get('api/orders', function(){ return Response::json(['orders'=> json_decode(Order::all())]);});
Route::get('api/xfiles', function(){ return Response::json(['xfiles'=> json_decode(Xfile::all())]);});
Route::get('api/users', function(){ return Response::json(['users'=> json_decode(User::all())]);});


/*
Sub-Domain Routing#

Laravel routes are also able to handle wildcard sub-domains, and pass you wildcard parameters from the domain:

Registering Sub-Domain Routes
*/
// Route::group(array('domain' => 'api.academicessaywritings.com'), function()
// {

// Route::get('/', 'HomeController@showWelcome');
Route::get('howitworks', function(){ return View::make('howitworks');});
Route::get('privacypolicy', function(){ return View::make('privacypolicy');});
Route::get('termsofuse', function(){ return View::make('termsofuse');});
Route::get('customerservice', function(){ return View::make('customerservice');});
Route::get('template', function(){return View::make('template');});
Route::get('contactus', function(){ return View::make('contactus');});

Route::get('forums', function(){return View::make('template');});
// Route::get('forum', 'BaseController@forum');
Route::get('blog', 'BaseController@blog');

Route::get('faq', function(){return Order::all();});


//UsersController
// Route::resource('users', 'UsersController');
// users --fields="fname:string, lname:string, uname:string, email:string, password:string, role:string, country:string, phone_1:string, phone_2:string"

Route::get('user/{id}', 'UserController@account', compact('id'))->where('id', '[0-9]+');

Route::get('user/edit', function(){
		if(!Auth::check()){
			return View::make('user/login');
		}
		else{
			$id =  Auth::user()->id;
			$user =  User::find($id);
			return Redirect::to('user/'.$id.'/edit')->with('user', $user);
		}
});
Route::get('user/{id}/edit', 'UserController@getEdit', compact('id'))->where('id', '[0-9]+');
Route::post('user/{id}/edit', 'UserController@postEdit', compact('id'))->where('id', '[0-9]+');

Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');

// Route::get('logout', 'UserController@getLogout');
Route::get('register', 'UserController@getRegister');
Route::post('register', 'UserController@postRegister');
Route::get('accounts', 'UserController@getIndex');
Route::get('account', 'UserController@getIndex');
Route::get('users', 'UserController@getIndex');
Route::controller('user', 'UserController'); //logout, getRegister, postRegister, 



//OrdersController
//getCreate, postCreate, getView, getEdit, postEdit, destroy, getListAll, getListByUser, getListByCategories
Route::resource('orders', 'OrdersController');
// orders --fields="topic:string, instructions:string, subject:string, doctype:string, pages:string, single_paced:boolean, style:string, academic_level:string, page_cost:string, total:string, currency:string, language:string, urgency:string, recieve_calls:boolean, status:string, notes:string"

	//indexAll() 	// all orders in system
		// Route::get('orders', 'OrdersController@index');
		Route::get('orders/all', 'OrdersController@indexAll');

	//indexByCategory($id) 	//all orders by a category - (order->properties) 
		Route::get('orders/category/{id}', 'OrdersController@indexByCategory', compact('id'))->where('id', '[0-9]+');

	//indexByUser($id) // all orders by a user id
		Route::get('orders/user/{id}', 'OrdersController@indexByUser', compact('id'))->where('id', '[0-9]+');
		Route::get('user/{id}/orders', 'OrdersController@indexByUser', compact('id'))->where('id', '[0-9]+');

	//add() // add order to listings
		Route::get('order/add', 'OrdersController@add');

	//index() // all orders by logged in user
		Route::resource('orders', 'OrdersController');
	 	//index create, store, show, edit, update, destroy // orders by a user



//XfilesController
Route::resource('xfiles', 'XfilesController'); // 'avoiding 'File', a class in Illuminate
// xfiles --fields="url:string, title:string, order_id:string, user_id:string, downloads:integer, category:string"

	//show($id) // view one xfile
		Route::get('xfile/{id}','XfilesController@show', compact('id'))->where('id', '[0-9]+');

	//index() // all xfiles
		Route::get('xfiles', 'XfilesController');
		Route::get('xfiles/all', 'XfilesController');

	//indexByUser($id) 	// all xfiles by a user
		Route::get('xfiles/user/{id}', 'XfilesController@indexByUser', compact('id'))->where('id', '[0-9]+');
		Route::get('user/{id}/xfiles', 'XfilesController@indexByUser', compact('id'))->where('id', '[0-9]+');

	//indexMyXfiles
		Route::get('user/xfiles', 'XfilesController@indexMyFiles'); //ajaxy mybooks

// });


/*
Route Prefixing for the api#

A group of routes may be prefixed by using the prefix option in the attributes array of a group:

Prefixing Grouped Routes
*/

Route::group(['prefix' => 'l4'], function()
{
//here we go
});

