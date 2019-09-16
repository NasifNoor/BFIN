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
//logout
Route::get('/logout', 'LogoutController@index');
//login
Route::get('/', 'LoginController@index')->name('login.index');
Route::post('/', 'LoginController@verify');
//register
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');
//user
Route::get('/user', 'UserController@index')->name('User.index');

Route::get('/createCustomer', 'UserController@createCustomer');
Route::post('/createCustomer', 'UserController@createdCustomer');

Route::get('/createProduct', 'UserController@createProduct');
Route::post('/createProduct', 'UserController@createdProduct');

Route::get('/createInvoice', 'UserController@createInvoice');
Route::post('/createInvoice', 'UserController@createdInvoice');

Route::get('/viewInvoice', 'UserController@viewInvoice')->name('view.invoice');
Route::get('/view/{id}', 'UserController@invoiceDetails');


Route::post('/view/{id}', 'UserController@pay');