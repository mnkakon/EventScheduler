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

Route::get('/', ['as' => 'event.index', 'uses' => 'HomeController@show']);
Route::get('error', ['as' => 'errors', 'uses' => 'pagecontroller@err']);

Route::get('event/feed', ['as' => 'feed', 'uses' => 'HomeController@feed']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
Route::get('register',['as' => 'register', 'uses' =>'Auth\AuthController@register']);
Route::post('postregister',['as' => 'postregister',
 'uses'=>'Auth\AuthController@postRegister']);
Route::get('event/details/{id}', ['as' => 'event.details', 'uses' => 'HomeController@details']);
Route::group(array('middleware' => 'guest'), function()
{

Route::get('register',['as' => 'register', 'uses' =>'Auth\AuthController@register']);
Route::post('postregister',['as' => 'postregister',
 'uses'=>'Auth\AuthController@postRegister']);
Route::get('login', ['as' =>'login','uses' => 'Auth\AuthController@login']);
Route::post('dologin', ['as' => 'dologin', 'uses' => 'Auth\AuthController@doLogin']); 
});
Route::group(array('middleware' => 'superAdmin'), function()
{

Route::get('pending/admin', ['as' => 'pending.admin', 'uses' => 'UserController@deptCreate']);
Route::get('post/pending/admin/{id}', ['as' => 'admin.create', 'uses' => 'UserController@adminInsert']);
Route::any('del/pending/admin{id}', ['as' => 'admin.delete', 'uses' => 'UserController@adminDelete']);
Route::any('event_type/delete/{id}',['as' => 'event_type.delete', 'uses' =>'EventController@delete']);
Route::post('dept/store', ['as' => 'dept.store', 'uses' => 'EventTypeController@create']);

Route::any('dept/delete/{id}',['as' => 'dept.delete', 'uses' =>'EventTypeController@delete']);
});
Route::group(array('middleware' => 'student'), function()
{

Route::get('mydept', ['as' => 'event.mydept', 'uses' => 'HomeController@mydept']);

Route::get('myscription', ['as' => 'event.mysubs', 'uses' => 'HomeController@mySubscript']);

Route::get('event/subscribe/{id}', ['as' => 'event.subs', 'uses' => 'SubsciptController@getSubscript']);
Route::any('unsubscribe/{id}', ['as' => 'unsubs', 'uses' => 'SubsciptController@unSubscript']);
});
Route::group(array('middleware' => 'admin'), function()
{

Route::get('/index', ['as' => 'event.index', 'uses' => 'HomeController@show']);

Route::get('pending/student', ['as' => 'pending.student', 'uses' => 'UserController@studentCreate']);

Route::get('post/pending/student/{id}', ['as' => 'student.create', 'uses' => 'UserController@studentInsert']);

Route::any('del/pending/student{id}', ['as' => 'student.delete', 'uses' => 'UserController@studentDelete']);

Route::get('event/myevent', ['as' => 'event.own', 'uses' => 'EventController@myevent']);

Route::get('event/list', ['as' => 'event.list', 'uses' => 'EventController@list']);

Route::get('event/create', ['as' => 'event.create', 'uses' => 'EventController@create']);


Route::post('event/store', ['as' => 'event.store', 'uses' => 'EventController@store']);

Route::get('event/edit/{id}', ['as' => 'event.update', 'uses' => 'EventController@edit']);

Route::put('exam/update/{id}',['as' => 'event.update.save', 'uses' =>'EventController@update_save']);

Route::any('exam/delete/{id}',['as' => 'event.delete', 'uses' =>'EventController@destroy']);

Route::get('event/type', ['as' => 'event.type', 'uses' => 'EventController@read']);

Route::post('e_type/store', ['as' => 'e_type.store', 'uses' => 'EventController@stock']);

Route::put('event_type/edit/{id}', ['as' => 'event_type.update', 'uses' => 'EventController@update']);

Route::get('department', ['as' => 'dept', 'uses' => 'EventTypeController@dept_show']);


});