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

Auth::routes(['register' => false]);


//  FOR BOTH ADMIN AND EMPLOYEES

Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');

//  EMPLOYEES

    //  EMPLOYEES LOGIN
    Route::get('/employee/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
    Route::post('/employee/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');

    //  EMLPOYEES OTHER
    Route::get('employee/dasbhoard', 'EmployeesController@showMe')->name('employee.dashboard');
    Route::get('employee/personal', 'Admin\UsersController@showMe')->name('employee.personal');
    Route::get('employee/animals', 'Admin\AnimalsController@myAnimals')->name('employee.animals.index');
    Route::resource('/employee', 'EmployeesController');
    Route::post('/employee/animals/search', 'Admin\AnimalsController@getSearchEmployee');
    Route::post('/employee/animals/filter', 'Admin\AnimalsController@getFilterEmployee');


    Route::post('/employee/animals/details', 'Admin\AnimalsController@detailsEmployee');
    Route::post('/employee/animals/description', 'Admin\AnimalsController@editDescription');
    Route::post('/employee/animals/update_description', 'Admin\AnimalsController@updateDescription');


//  ADMIN

    //  ADMIN NAMESPACE
    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
        
        Route::get('personal', 'UsersController@showMe')->name('personal');
  

        //  ADMIN ANIMALS
        Route::resource('/animals', 'AnimalsController');
 
        
        Route::post('/animals/search', 'AnimalsController@getSearch');
        Route::post('/animals/filter', 'AnimalsController@getFilter');

        //  ADMIN EMPLOYEES
        Route::resource('/employees', 'UsersController');
        Route::post('/employees/update', 'UsersController@updateStatus');
    });

    // ADMINS LOGIN
    Route::post('/login', 'Auth\LoginController@login')->name('login.submit');

    //  ADMIN EMPLOYEES
    


    //  ADMIN OTHER
  
