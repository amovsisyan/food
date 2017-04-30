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

Route::get('/food', ['uses'=>'Categories@food','as'=>'food_categories']);

Route::get('/food/{type}', ['uses'=>'FoodController@all','as'=>'food_current_category']);

Route::get('/food/{type}/{alias}', ['uses'=>'FoodController@current','as'=>'food_current']);

Route::get('/cocktail', ['uses'=>'Categories@cocktail','as'=>'cocktail_categories']);

Route::get('/cocktail/{type}', ['uses'=>'CocktailController@all','as'=>'cocktail_current_category']);

Route::get('/cocktail/{type}/{alias}', ['uses'=>'CocktailController@current','as'=>'cocktail_current']);


//https://tympanus.net/codrops/2013/08/09/building-a-circular-navigation-with-css-transforms/

