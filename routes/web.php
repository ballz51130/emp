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
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/mainadmin', 'admin\AdminController@index');
        Route::resource('/manageuser', 'admin\ManageUserController');
        Route::get('/manageuser', 'admin\ManageUserController@index');
        Route::get('/manageuser/{id}/edit', 'admin\ManageUserController@edit');
        Route::get('/manageuser/{id}/delete', 'admin\ManageUserController@delete');
        Route::resource('/manageposition', 'admin\positionController');
        Route::get('/manageposition', 'admin\positionController@index');
        Route::get('/manageposition/{id}/edit', 'admin\positionController@edit');
        Route::get('/manageposition/{id}/delete', 'admin\positionController@delete');
        
    });

});
