<?php
use Illuminate\Support\Facades\Auth;
// Auth::routes();

Route::get('/', function () {
    // call session login customer
    // dd(Auth::guard('customer')->user()->email);
    return view('home');
});

// Home
Route::get('/home', 'HomeController@index')->name('home');

// logout
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Customer case
Route::get('/customer/login', 'CustomerLoginController@LoginForm')->middleware('guest');
Route::post('/customer/login', 'CustomerLoginController@login')->name('customer.login')->middleware('guest');

Route::get('/customer/register', 'CustomerController@RegisterForm')->middleware('guest');
Route::post('/customer/register', 'CustomerController@register')->name('customer.register')->middleware('guest');

Route::post('/customer/order', 'CustomerController@orderTransaction')->name('customer.order');
Route::get('/customer/cek-status', 'CustomerController@showViewCode')->name('customer.viewcode');
Route::post('/customer/cek-status', 'CustomerController@showOrderStatus')->name('customer.cekstatus');
Route::get('/customer/undangan', 'CustomerController@undangan')->name('customer.undangan');


// Admin case
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('/admin/login', 'Auth\LoginController@login')->name('admin.login')->middleware('guest');
Route::get('/admin/home', 'AdminController@home')->name('admin.index.home')->middleware('auth');

// customer
Route::get('/admin/customer', 'AdminController@indexCustomer')->name('admin.index.customer')->middleware('auth');
Route::post('/admin/customer/add', 'AdminController@addCustomer')->name('admin.add.customer')->middleware('auth');
Route::get('/admin/customer/edit/{customer}', 'AdminController@editCustomer')->name('admin.edit.customer')->middleware('auth');
Route::put('/admin/customer/update/{customer}', 'AdminController@updateCustomer')->name('admin.update.customer')->middleware('auth');
Route::delete('/admin/customer/delete/{customer}', 'AdminController@deleteCustomer')->name('admin.delete.customer')->middleware('auth');

// plan
Route::get('/admin/plan', 'AdminController@indexPlan')->name('admin.index.plan')->middleware('auth');
Route::post('/admin/plan/add', 'AdminController@addPlan')->name('admin.add.plan')->middleware('auth');
Route::get('/admin/plan/edit/{plan}', 'AdminController@editPlan')->name('admin.edit.plan')->middleware('auth');
Route::put('/admin/plan/update/{plan}', 'AdminController@updatePlan')->name('admin.update.plan')->middleware('auth');
Route::delete('/admin/plan/delete/{plan}', 'AdminController@deletePlan')->name('admin.delete.plan')->middleware('auth');

// transaction
Route::get('/admin/transaction', 'AdminController@indexTransaction')->name('admin.index.transaction')->middleware('auth');
Route::get('/admin/transaction/edit/{transaction}', 'AdminController@showTransaction')->name('admin.show.transaction')->middleware('auth');
Route::put('/admin/transaction/verify/{transaction}', 'AdminController@verifyTransaction')->name('admin.verify.transaction')->middleware('auth');

Route::get('/tes/mail', 'CustomerController@sendMail');
