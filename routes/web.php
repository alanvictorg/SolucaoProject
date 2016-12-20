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
    Route::get('home', 'HomeController@index')->name('admin.home.index');
    Route::resource('company', 'CompaniesController');
    Route::resource('project', 'ProjectsController');
    Route::resource('user', 'UsersController');
    Route::resource('task', 'TasksController');
    Route::resource('timeline', 'TimelinesController');
    Route::resource('resource', 'ResourcesController');
    Route::resource('report', 'ResourcesController');
    Route::get('import','ImportController@index')->name('admin.import.index');
    Route::post('import','ImportController@store')->name('admin.import.store');
    Route::get('import/createproject','ImportController@createproject')->name('admin.import.createproject');
    Route::post('import/storeProject','ImportController@storeProject')->name('admin.import.storeProject');

});
Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
    Route::get('home', 'HomeController@index')->name('home.index');
});
