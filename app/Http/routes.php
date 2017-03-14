<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::post('change-password', 'Auth\AuthController@updatePassword');
Route::get( 'change-password', 'Auth\AuthController@updatePassword');

//CMM added this line 9 Mar 2017
Route::group(['middleware' => ['auth']], function() {
		Route::get('/home', 'HomeController@index'); //this was already there by default
        //CMM added the following code 9 Mar 2017
        Route::resource('users','UserController');
        //Route::resource('roles','RolesController');
        //Route::resource('cancer_types','Cancer_TypeController');


//roles
      	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-read|role-create|role-edit|role-delete']]);
		Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
		Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
		Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
		Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
		Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
		Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

//cancer types
		Route::get('cancer_types',['as'=>'cancer_types.index','uses'=>'Cancer_TypeController@index','middleware' => ['permission:cancer_type-read|cancer_type-create|cancer_type-edit|cancer_type-delete']]);
		Route::get('cancer_types/create',['as'=>'cancer_types.create','uses'=>'Cancer_TypeController@create','middleware' => ['permission:cancer_type-create']]);
		Route::post('cancer_types/create',['as'=>'cancer_types.store','uses'=>'Cancer_TypeController@store','middleware' => ['permission:cancer_type-create']]);
		Route::get('cancer_types/{id}',['as'=>'cancer_types.show','uses'=>'Cancer_TypeController@show']);
		Route::get('cancer_types/{id}/edit',['as'=>'cancer_types.edit','uses'=>'Cancer_TypeController@edit','middleware' => ['permission:cancer_type-edit']]);
		Route::patch('cancer_types/{id}',['as'=>'cancer_types.update','uses'=>'Cancer_TypeController@update','middleware' => ['permission:cancer_type-edit']]);
		Route::delete('cancer_types/{id}',['as'=>'cancer_types.destroy','uses'=>'Cancer_TypeController@destroy','middleware' => ['permission:cancer_type-delete']]);
	
//activity types
		Route::get('activitytypes',['as'=>'activitytypes.index','uses'=>'ActivityTypeController@index','middleware' => ['permission:activity_type-read|activity_type-create|activity_type-edit|activity_type-delete']]);
		Route::get('activitytypes/create',['as'=>'activitytypes.create','uses'=>'ActivityTypeController@create','middleware' => ['permission:activity_type-create']]);
		Route::post('activitytypes/create',['as'=>'activitytypes.store','uses'=>'ActivityTypeController@store','middleware' => ['permission:activity_type-create']]);
		Route::get('activitytypes/{id}',['as'=>'activitytypes.show','uses'=>'ActivityTypeController@show']);
		Route::get('activitytypes/{id}/edit',['as'=>'activitytypes.edit','uses'=>'ActivityTypeController@edit','middleware' => ['permission:activity_type-edit']]);
		Route::patch('activitytypes/{id}',['as'=>'activitytypes.update','uses'=>'ActivityTypeController@update','middleware' => ['permission:activity_type-edit']]);
		Route::delete('activitytypes/{id}',['as'=>'activitytypes.destroy','uses'=>'ActivityTypeController@destroy','middleware' => ['permission:activity_type-delete']]);

//locations
		Route::get('locations',['as'=>'locations.index','uses'=>'LocationController@index','middleware' => ['permission:location-read|location-create|location-edit|location-delete']]);
		Route::get('locations/create',['as'=>'locations.create','uses'=>'LocationController@create','middleware' => ['permission:location-create']]);
		Route::post('locations/create',['as'=>'locations.store','uses'=>'LocationController@store','middleware' => ['permission:location-create']]);
		Route::get('locations/{id}',['as'=>'locations.show','uses'=>'LocationController@show']);
		Route::get('locations/{id}/edit',['as'=>'locations.edit','uses'=>'LocationController@edit','middleware' => ['permission:location-edit']]);
		Route::patch('locations/{id}',['as'=>'locations.update','uses'=>'LocationController@update','middleware' => ['permission:location-edit']]);
		Route::delete('locations/{id}',['as'=>'locations.destroy','uses'=>'LocationController@destroy','middleware' => ['permission:location-delete']]);

//Employees
		Route::get('employees',['as'=>'employees.index','uses'=>'EmployeeController@index','middleware' => ['permission:employee-read|employee-create|employee-edit|employee-delete']]);
		Route::get('employees/create',['as'=>'employees.create','uses'=>'EmployeeController@create','middleware' => ['permission:employee-create']]);
		Route::post('employees/create',['as'=>'employees.store','uses'=>'EmployeeController@store','middleware' => ['permission:employee-create']]);
		Route::get('employees/{id}',['as'=>'employees.show','uses'=>'EmployeeController@show']);
		Route::get('employees/{id}/edit',['as'=>'employees.edit','uses'=>'EmployeeController@edit','middleware' => ['permission:employee-edit']]);
		Route::patch('employees/{id}',['as'=>'employees.update','uses'=>'EmployeeController@update','middleware' => ['permission:employee-edit']]);
		Route::delete('employees/{id}',['as'=>'employees.destroy','uses'=>'EmployeeController@destroy','middleware' => ['permission:employee-delete']]);


//Volunteers
/*
		Route::get('locations',['as'=>'locations.index','uses'=>'LocationController@index','middleware' => ['permission:location-read|location-create|location-edit|location-delete']]);
		Route::get('locations/create',['as'=>'locations.create','uses'=>'LocationController@create','middleware' => ['permission:location-create']]);
		Route::post('locations/create',['as'=>'locations.store','uses'=>'LocationController@store','middleware' => ['permission:location-create']]);
		Route::get('locations/{id}',['as'=>'locations.show','uses'=>'LocationController@show']);
		Route::get('locations/{id}/edit',['as'=>'locations.edit','uses'=>'LocationController@edit','middleware' => ['permission:location-edit']]);
		Route::patch('locations/{id}',['as'=>'locations.update','uses'=>'LocationController@update','middleware' => ['permission:location-edit']]);
		Route::delete('locations/{id}',['as'=>'locations.destroy','uses'=>'LocationController@destroy','middleware' => ['permission:location-delete']]);
*/

//Victims
/*
		Route::get('locations',['as'=>'locations.index','uses'=>'LocationController@index','middleware' => ['permission:location-read|location-create|location-edit|location-delete']]);
		Route::get('locations/create',['as'=>'locations.create','uses'=>'LocationController@create','middleware' => ['permission:location-create']]);
		Route::post('locations/create',['as'=>'locations.store','uses'=>'LocationController@store','middleware' => ['permission:location-create']]);
		Route::get('locations/{id}',['as'=>'locations.show','uses'=>'LocationController@show']);
		Route::get('locations/{id}/edit',['as'=>'locations.edit','uses'=>'LocationController@edit','middleware' => ['permission:location-edit']]);
		Route::patch('locations/{id}',['as'=>'locations.update','uses'=>'LocationController@update','middleware' => ['permission:location-edit']]);
		Route::delete('locations/{id}',['as'=>'locations.destroy','uses'=>'LocationController@destroy','middleware' => ['permission:location-delete']]);
*/
		
});

