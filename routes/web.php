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
    return redirect('login');
});
Route::get('/home', function () {
    return redirect('admin/home');
});

Auth::routes();
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('home', 'HomeController@index')->name('home.index');
    Route::resource('company', 'CompaniesController');
    Route::resource('project', 'ProjectsController');
    Route::resource('user', 'UsersController');
    Route::resource('task', 'TasksController');
    Route::resource('timeline', 'TimeLinesController');
    Route::resource('resource', 'ResourcesController');
    Route::get('import','ImportController@index')->name('import.index');

});
Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
    Route::get('home', 'HomeController@index')->name('home.index');
});
