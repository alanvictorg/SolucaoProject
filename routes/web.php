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
    return redirect('admin/');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/', 'HomeController@index')->name('home.index');

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


        //Fim ACL

        //Gerenciamento

        Route::group(['companies'], function () {
            Route::resource('companies', 'CompaniesController');
            Route::post('companies/search', 'CompaniesController@search')->name('companies.search');
        });
        Route::group(['projects'], function () {
            Route::resource('projects', 'ProjectsController');
            Route::post('projects/search', 'ProjectsController@search')->name('projects.search');
        });
        Route::group(['tasks'], function () {
            Route::resource('tasks', 'TasksController');
            Route::post('tasks/search', 'TasksController@search')->name('tasks.search');
        });
        Route::group(['imports'], function () {
            Route::resource('imports', 'ImportsController');
            Route::post('imports/search', 'ImportsController@search')->name('imports.search');
        });
    });




});