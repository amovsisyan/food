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

Route::get('/', ['uses'=>'HomeController@index','as'=>'home']);

Route::get('/hashtag', ['uses'=>'HashtagController@hashtag','as'=>'hashtag_search']);

Route::get('/{category}', ['uses'=>'CategoriesController@category','as'=>'category']);

Route::get('/{category}/{type}', ['uses'=>'CategoriesController@current_category','as'=>'current_category']);

Route::get('/{category}/{type}/{alias}', ['uses'=>'ProductController@products','as'=>'food_current']);

//https://tympanus.net/codrops/2013/08/09/building-a-circular-navigation-with-css-transforms/

