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
    return view('welcome');
});


// Route::post('');

// Route::get('/dashboard');
// Route::get('/people/{id}', 'UserProfilesController@show');


// Not secure. Malicious user can edit anyone's account
// OLD: Route::get('/profiles/edit/{id}', 'UserProfilesController@edit');
// Route::get('/profiles/{user}', ['as' => 'profiles.edit', 'uses' => 'UserProfilesController@edit']);
Route::get('/profiles/edit', 'UserProfilesController@edit');


// Route::get('/preferences/account', '');

// Route::get('/groups', '');
// Route::get('/members/search', '');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
