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

Route::get('/payment', 'PaymentController@payments')->name('payment');
Route::get('/payment/accepted', 'PaymentController@paymentsAccepted')->name('payment.accepted');
Route::get('/payment/denied', 'PaymentController@paymentsDenied')->name('payment.denied');
Route::get('/payment/{id}/edit', 'PaymentController@editPage')->name('payment.edit.page');
Route::post('/payment/{id}/edit/submit', 'PaymentController@edit')->name('payment.edit.submit');

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

Route::get('/indus', 'IndusController@index')->name('indus');
Route::get('/indus/pay', 'IndusController@indusPay')->name('indus.pay');
Route::post('/indus/pay/submit', 'IndusController@saveData')->name('pay.submit');


/////////
Route::post('/saveAmount', 'IndusController@saveAmount')->name('saveAmount');
Route::post('/saveFullRequest', 'IndusController@saveFullRequest')->name('saveFullRequest');
Route::post('/payed', 'IndusController@payed')->name('payed');

Route::get('/test', function () {
    return view('test');
});


Auth::routes();

