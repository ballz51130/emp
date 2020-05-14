<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/mainuser', 'userController@index');
    Route::resource('/manageuser', 'user\UserController');
    
    //change password
    Route::resource('/changepassword', 'user\changepasswordController');
    Route::get('/changepassword', 'user\changepasswordController@index');
    Route::get('/changepassword/{id}/edit', 'user\changepasswordController@edit');
    Route::get('/changepassword/{id}/delete', 'user\changepasswordController@delete');

    Route::get('/profile', 'user\UserController@index');
    Route::get('/profile/update', 'user\UserController@edit');
    
    Route::resource('/leave', 'user\leaveController');
    Route::get('/leave', 'user\leaveController@index');
});



//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/mainadmin', 'admin\AdminController@index');
        // mamage User
        Route::resource('/manageuser', 'admin\ManageUserController');
        Route::get('/manageuser', 'admin\ManageUserController@index');
        Route::get('/manageuser/{id}/edit', 'admin\ManageUserController@edit');
        Route::get('/manageuser/{id}/delete', 'admin\ManageUserController@delete');
        // change password
        Route::resource('/changepasswords', 'admin\changepasswordsController');
        Route::get('/changepasswords', 'admin\changepasswordsController@index');
        Route::get('/changepasswords/{id}/edit', 'admin\changepasswordsController@edit');
        Route::get('/changepasswords/{id}/delete', 'admin\changepasswordsController@delete');
        // mamage position
        Route::resource('/manageposition', 'admin\positionController');
        Route::get('/manageposition', 'admin\positionController@index');
        Route::get('/manageposition/{id}/edit', 'admin\positionController@edit');
        Route::get('/manageposition/{id}/delete', 'admin\positionController@delete');
        // mamage department
        Route::resource('/managedepartment', 'admin\departmentController');
        Route::get('/managedepartment', 'admin\departmentController@index');
        Route::get('/managedepartment/{id}/edit', 'admin\departmentController@edit');
        Route::get('/managedepartment/{id}/delete', 'admin\departmentController@delete');
 
    });

});
