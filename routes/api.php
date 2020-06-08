<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5MTM2NjYwNSwiZXhwIjoxNjUxMzY2NTQ1LCJuYmYiOjE1OTEzNjY2MDUsImp0aSI6IllMUkhFc1lKMHB3enlYcnEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.WYNrpVRDMbAewJWDwCB2-9ACsRbmN4Fm37h4wi0-6OQ
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Auth')->group(function(){
    Route::post("register","RegisterController");
    Route::post("login","LoginController");
    Route::post("logout","LogoutController");
});

Route::namespace('Article')->middleware("auth:api")->group(function(){
  Route::post("create-article","ArticleController@store");
  Route::patch("update-article/{id}","ArticleController@update");
  Route::delete("delete-article/{id}","ArticleController@destroy");
});

Route::get("articles/{article}","Article\ArticleController@show");
Route::get("articles","Article\ArticleController@index");


Route::get("user","UserController")->middleware("auth:api");
