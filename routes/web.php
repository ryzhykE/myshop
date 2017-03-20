<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

$s = 'public.';
Route::get('/',['as' => $s . 'home',   'uses' => 'PagesController@getHome']);

Route::get('/add-to-cart/{id}', [
    'uses' => 'PagesController@getAddToCart',
    'as' => 'product.addToCart'
]);



//social
$s = 'social.';
Route::get('/social/redirect/{provider}', ['as' => $s . 'redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => $s . 'handle', 'uses' => 'Auth\SocialController@getSocialHandle']);
//user
Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function()
{
    Route::get('/', ['as' => 'user.home', 'uses' => 'UserController@getHome']);
	
    Route::group(['middleware' => 'activated'], function ()
    {
        $m = 'activated.';
        Route::get('protected', ['as' => $m . 'protected', 'uses' => 'UserController@getProtected']);
    });
});

Route::group(['middleware' => 'auth:all'], function()
{
    Route::get('/logout', ['as' => 'authenticated.logout', 'uses' => 'Auth\LoginController@logout']);
});

Auth::routes(['login' => 'auth.login']);
