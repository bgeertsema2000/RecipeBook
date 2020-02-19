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

Route::get('/', function () {
    return redirect('/myrecipes');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/myrecipes', 'HomeController@index')->name('home');
    Route::get('/myrecipes', 'HomeController@get')->name('home');
    Route::get('/myrecipes/{recipe}', 'RecipeController@showrecipe')->name('myrecipes');
    Route::resource('recipes', 'RecipeController');
});

