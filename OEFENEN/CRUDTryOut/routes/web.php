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
    return view('start');
});

// Route::get('/animal', function () {
//     return view('animal');
// });

// Route::resource('animals', 'AnimalsController');

Auth::routes();




Route::get('/home', 'HomeController@index')->name('admin.home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
  
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');

    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/animals', 'AnimalsController');

    Route::post('/animals/update', 'AnimalsController@updateStatus');
    Route::post('/animals/search', 'AnimalsController@getSearch');
    Route::post('/animals/filter', 'AnimalsController@getFilter');
   
    Route::get('/', 'AdminsController@index')->name('dashboard');
 
});