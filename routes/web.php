<?php



Route::get('/','LoginController@login')->name('master');

//->middleware('first', 'second');



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
    Route::get('/group-roles/{id}','GroupController@groupCreateRoles')->name('groupRoles.create');
    Route::delete('/user-data/{id}','userController@deleteUserData')->name('userData.destroy');

    Route::get('dropdownlist','DropdownController@index')->name('get-resort-list.index');
    Route::get('get-group-list/{id}','DropdownController@getGroupList')->name('get-group-list.index');
    Route::get('get-role-list/{id}','DropdownController@getRoleList')->name('get-role-list.index');

});


Auth::routes();
