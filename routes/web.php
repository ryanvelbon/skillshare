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

Route::get('/testing', function(){
	return view('_test.tagging');
});

// Route::get('/', 'ListingsController@index');

Route::get('/dashboard', 'DashboardController@index');


// Route::post('');

// Route::get('/dashboard');
// Route::get('/people/{id}', 'UserProfilesController@show');


// Not secure. Malicious user can edit anyone's account
// OLD: Route::get('/profiles/edit/{id}', 'UserProfilesController@edit');
// Route::get('/profiles/{user}', ['as' => 'profiles.edit', 'uses' => 'UserProfilesController@edit']);
Route::get('/profiles/edit', 'UserProfilesController@edit');



//
// Route::resource('/profiles', 'UserProfilesController');


// Should method be PUT or POST?
Route::put('/profiles/edit/submit', 'UserProfilesController@update');

Route::get('/profiles/{id}', 'UserProfilesController@show');


// Route::get('/preferences/account', '');

// Route::get('/groups', '');
// Route::get('/members/search', '');
Auth::routes();

Route::resource('listings', 'ListingsController');


Route::get('/dashboard/projects', 'DashboardController@projects');
// Route::get('/messages', );
