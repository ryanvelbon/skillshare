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
	return view('_test.profileShow');
});

Route::get('/', 'ListingsController@index');

Route::get('/dashboard', 'DashboardController@index');


// Route::post('');

// Route::get('/dashboard');
// Route::get('/people/{id}', 'UserProfilesController@show');


// Not secure. Malicious user can edit anyone's account
// OLD: Route::get('/profiles/edit/{id}', 'UserProfilesController@edit');
// Route::get('/profiles/{user}', ['as' => 'profiles.edit', 'uses' => 'UserProfilesController@edit']);



Route::get('/search/hints/{table}/{q}', 'SearchController@getHints')->name('search.hints');


//
// Route::resource('/profiles', 'UserProfilesController');
Route::get('/profiles/edit', 'UserProfilesController@edit');
Route::put('/profiles/edit/submit', 'UserProfilesController@update');
Route::get('/profiles/search', 'UserProfilesController@search')->name('profiles.search');
Route::get('/profiles/filtered-search', 'UserProfilesController@filteredSearch')->name('profiles.filteredSearch');
Route::get('/profiles/{id}', 'UserProfilesController@show'); // careful with routing! This should be last route
Route::get('/profiles', 'UserProfilesController@index')->name('profiles.index');


// Route::get('/preferences/account', '');

// Route::get('/groups', '');
// Route::get('/members/search', '');
Auth::routes();


Route::get('listings/search', 'ListingsController@search')->name('listings.search');
Route::resource('listings', 'ListingsController');


// Route::get('/messages', );
