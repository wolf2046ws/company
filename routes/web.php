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
    return redirect('/login');
    //return view('welcome');
})->name('master')->middleware('shared_variables');

Route::post('/user-update-components/{id}','userController@updateComponents')->name('user.updateComponents');


Route::group(['middleware' => ['web','shared_variables','check_auth','route_permissions']],function(){

        Route::resource('/user','userController');
        Route::resource('/permission', 'PermissionController');
        Route::resource('/group', 'GroupController');
        Route::resource('/role', 'RoleController');
        Route::resource('/department', 'DepartmentController');
        Route::resource('/resort', 'ResortController');
        Route::resource('/resort-users', 'ResortUserController');
        Route::resource('/department-users', 'DepartmentUserController');
        Route::get('/resort-groups/{id}','ResortController@resortGroup')->name('resortGroup.index');
        Route::get('/resort-creategroups/{id}','ResortController@resortCreateGroup')->name('resortGroup.create');
        Route::get('/group-roles/{id}','GroupController@groupCreateRoles')->name('groupRoles.create');
        Route::get('/group-createroles/{id}','GroupController@groupRoles')->name('groupRoles.index');
        Route::delete('/users-resort-delete/{id}','ResortController@deleteUser')->name('resortUser.destroy');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
