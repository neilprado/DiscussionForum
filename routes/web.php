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

Route::get('/', 'PagesController@index');
Route::resource('/comments', 'CommentsController');

Route::group(['prefix' => 'temas', 'middleware' => 'auth'], function(){
  Route::get('create', 'ThemesController@create');
  Route::post('create', 'ThemesController@store');
  Route::get('{id}/edit', 'ThemesController@edit');
  Route::patch('{id}', 'ThemesController@update');
  Route::delete('{id}', 'ThemesController@destroy');
});
Route::get('/temas', 'ThemesController@index');
Route::get('/temas/{id}', 'ThemesController@show');
Route::post('/temas/filtro', 'ThemesController@filterThemes'); 

Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function(){
  Route::get('create', 'PostsController@create');
  Route::post('create', 'PostsController@store');
  Route::get('{id}/edit', 'PostsController@edit');
  Route::patch('{id}', 'PostsController@update');
  Route::delete('{id}', 'PostsController@destroy');
});
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{id}', 'PostsController@show');
Route::post('posts/filtro', 'PostsController@filterPosts');

Route::group(['prefix' => 'relatives', 'middleware' => 'auth'], function(){
  Route::get('/', 'RelativesController@index');
  Route::get('create', 'RelativesController@create');
  Route::post('create', 'RelativesController@store');
  Route::get('{id}/edit', 'RelativesController@edit');
  Route::patch('{id}', 'RelativesController@update');
  Route::delete('{id}', 'RelativesController@destroy');
});

Auth::routes();

Route::get('/home', 'PagesController@index')->name('home');

Route::get('tree/{user?}', 'RelativesController@showTree');

// Route Register
Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
// Route Login / Logout
Route::get('login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');
