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
    return view('app');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/customers', function () {
    return view('customers.index');
})->name('customers');

Route::get('/customers/add', function () {
    return view('customers.add');
})->name('customers');

Route::get('/customers/edit', function () {
    return view('customers.edit');
})->name('customers');

Route::get('/invoice', function () {
    return view('invoice.index');
})->name('invoice');

Route::get('/invoice/create', function () {
    return view('invoice.add');
})->name('invoice');

Route::get('/invoice/view', function () {
    return view('invoice.view');
})->name('invoice');