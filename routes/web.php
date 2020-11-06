<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@profile')->name('profile');

Route::get('/requests', 'HomeController@requests')->name('requests');
Route::get('/requests/accepted', 'HomeController@requestsAccepted')->name('requests.accepted');
Route::get('/requests/denied', 'HomeController@requestsDenied')->name('requests.denied');
Route::get('/requests/{id}/edit', 'UserRequestController@page')->name('requests.edit.page');
Route::post('/requests/{id}/edit/submit', 'UserRequestController@edit')->name('requests.edit.submit');

Route::get('/accounts/active/{id}', 'AccountController@changeActive')->name('change.active');
Route::get('/accounts', 'HomeController@accounts')->name('accounts');
Route::get('/accounts/add', 'AccountController@page')->name('add.account');
Route::post('/accounts/add/submit', 'AccountController@add')->name('add.account.post');
Route::get('/accounts/{id}', 'AccountController@destroy')->name('destroy.account');
Route::post('/accounts/{account}/edit/submit', 'AccountController@edit')->name('edit.account');
Route::get('/accounts/{id}/edit', 'AccountController@editPage')->name('edit.account.page');

Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register/submit', 'UserController@store')->name('register.store');
Route::post('/login/submit', 'UserController@login')->name('login.check');
Route::get('/login', 'HomeController@login')->name('login');
Route::get('/logout', 'HomeController@logout');

Route::get('/active/{id}', 'UserController@changeActive')->name('change.active.profile');

Auth::routes();

