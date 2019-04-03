<?php

Route::get('/', function () {
    return redirect('/login');
})->name('master');


Route::group(['middleware' => ['web','check_auth','shared_variables','route_permissions']],function(){

    Route::get('/user-disabled','userController@getDisbleUser')->name('user.disabled');
    Route::post('/user-change-status','userController@changeStatus')->name('user.changeStatus');
    Route::post('/user-change-status-approved/{id}','userController@changeStatusApproved')->name('user.changeStatusApproved');

        Route::resource('/user','userController');
        Route::resource('/permission', 'PermissionController');
        Route::resource('/group', 'GroupController');
        Route::resource('/role', 'RoleController');
        Route::resource('/resort', 'ResortController');
        Route::resource('/resort-users', 'ResortUserController');
        Route::get('/resort-groups/{id}','ResortController@resortGroup')->name('resortGroup.index');
        Route::get('/resort-creategroups/{id}','ResortController@resortCreateGroup')->name('resortGroup.create');
        Route::get('/group-roles/{id}','GroupController@groupCreateRoles')->name('groupRoles.create');
        Route::get('/group-createroles/{id}','GroupController@groupRoles')->name('groupRoles.index');
        Route::delete('/user-data/{id}','userController@deleteUserData')->name('userData.destroy');

        Route::get('dropdownlist','DropdownController@index')->name('dropDownListResort.index');
        Route::get('get-group-list/{id}','DropdownController@getGroupList')->name('get-group.index');
        Route::get('get-role-list/{id}','DropdownController@getRoleList')->name('get-role.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
