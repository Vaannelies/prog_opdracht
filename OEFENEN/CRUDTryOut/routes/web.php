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

// EMPLOYEES LOGIN

Route::get('/employee/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
Route::post('/employee/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');

Route::get('employee/dasbhoard', 'EmployeesController@showMe')->name('employee.dashboard');

// ADMINS LOGIN
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');


Route::get('/admin/home', 'HomeController@index')->name('admin.home');
Route::get('/admin/employees', 'EmployeesController@index')->name('admin.employees.index');

//  FOR BOTH ADMIN AND EMPLOYEES

Route::resource('/employees', 'EmployeesController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/animals', 'AnimalsController');

    Route::post('/animals/update', 'AnimalsController@updateStatus');
    Route::post('/animals/search', 'AnimalsController@getSearch');
    Route::post('/animals/filter', 'AnimalsController@getFilter');
});

