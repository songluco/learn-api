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

/*

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//课程
Route::get('lesson/index', 'LessonsController@getIndex');
Route::get('lesson/show/{id}', 'LessonsController@getShow');
Route::post('lesson/add-lesson', 'LessonsController@postAddLesson');

*/




$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function($api){
        $api->get('lessons', 'LessonsController@index');
        $api->post('user/login', 'AuthController@authenticate');
    });
});

//
//$api->version('v1', function ($api) {
//    $api->get('users/{id}', 'App\Api\Controllers\UserController@show');
//});
//
//
//$api->version('v1', function ($api) {
//    $api->get('users/{id}', 'App\Api\V1\Controllers\UserController@show');
//});
//
//$api->version('v2', function ($api) {
//    $api->get('users/{id}', 'App\Api\V2\Controllers\UserController@show');
//});