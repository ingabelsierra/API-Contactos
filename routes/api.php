<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'API\AuthController@login');
//Route::post('register', 'API\AuthController@register');

Route::middleware('auth:api')->group(function(){
  Route::post('details', 'API\AuthController@getDetails');
  Route::post('contacts', 'ContactController@index');
  Route::get('contacts/{id}', 'ContactController@show');
  Route::post('contacts/create', 'ContactController@store');
  Route::put('contacts/update/{id}', 'ContactController@update');
  Route::delete('contacts/delete/{id}', 'ContactController@destroy');

   
});
