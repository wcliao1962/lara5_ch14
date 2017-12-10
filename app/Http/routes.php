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

Route::get('/', 'HomeController@index');
Route::get('search', 'HomeController@search');

Route::auth();

Route::resource('post', 'PostController');
Route::resource('post.comment', 'PostCommentController', ['only' => ['store', 'destroy']]);	
Route::resource('type', 'PostTypeController', ['except' => ['index']]);

Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
 	Route::get('avatar','UserController@getAvatar');
 	Route::post('avatar','UserController@postAvatar');
});

Route::group(['prefix'=>'login/social','middleware'=>['guest']],function(){
	Route::get('{provider}/redirect',[
		'as' => 'social.redirect',
		'uses' => 'Auth\SocialController@getSocialRedirect'
	]);
	Route::get('{provider}/callback',[
		'as' => 'social.handle',
		'uses' => 'Auth\SocialController@getSocialCallback'
	]);
});






