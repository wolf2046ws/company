<?php

Route::get('/', function () {
    return redirect('/login');
})->name('master');


// Route::get('{companyID}', ['uses' => CompanyController@index, 'middleware' => 'AuthResource']);


Route::group(['middleware' => ['web','check_auth','shared_variables']],function(){
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');

    Route::get('/user-disabled','userController@getDisbleUser')->name('user.disabled');
    Route::post('/user-change-status','userController@changeStatus')->name('user.changeStatus');
    Route::post('/user-change-status-approved/{id}','userController@changeStatusApproved')->name('user.changeStatusApproved');
    Route::post('/sync-database-with-ad','userController@syncDatabaseWithAD')->name('user.syncDatabaseWithAD');

    Route::resource('/user','userController');
    Route::resource('/permission', 'PermissionController');
    Route::resource('/group', 'GroupController');
    Route::resource('/role', 'RoleController');
    Route::resource('/resort', 'ResortController');
    Route::resource('/resort-users', 'ResortUserController');
    //Route::get('/resort-groups/{id}','ResortController@resortGroup')->name('resortGroup.index');
    //Route::get('/resort-creategroups/{id}','ResortController@resortCreateGroup')->name('resortGroup.create');
    Route::get('/group-roles/{id}','GroupController@groupCreateRoles')->name('groupRoles.create');
    //Route::get('/group-createroles/{id}','GroupController@groupRoles')->name('groupRoles.index');
    Route::delete('/user-data/{id}','userController@deleteUserData')->name('userData.destroy');

    Route::get('dropdownlist','DropdownController@index')->name('get-resort-list.index');
    //Route::get('get-permission-list','DropdownController@getPermissionList')->name('get-permission-list.index');
    Route::get('get-group-list/{id}','DropdownController@getGroupList')->name('get-group-list.index');
    Route::get('get-role-list/{id}','DropdownController@getRoleList')->name('get-role-list.index');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
