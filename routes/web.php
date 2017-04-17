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


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/home', 'HomeController@index')->name('home.index');

        Route::resource('users', 'UsersController');
        Route::post('users/search', 'UsersController@search')->name('users.search');
        Route::resource('roles', 'RolesController');
        Route::post('roles/search', 'RolesController@search')->name('roles.search');
        Route::resource('permissions', 'PermissionsController');
        Route::post('permissions/search', 'PermissionsController@search')->name('permissions.search');
        Route::get('role-permission/{role}', 'RolePermissionsController@index')->name('role-permission.index');
//        Route::resource('role-permission', 'RolePermissionsController');
        Route::post('role-permission/search', 'RolePermissionsController@search')->name('role-permission.search');
        Route::post('role-permission/{role}', 'RolePermissionsController@store')->name('role-permission.store');
        Route::delete('role-permission/{role-permission}', 'RolePermissionsController@edit')->name('role-permission.destroy');
    });
});