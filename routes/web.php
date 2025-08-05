<?php
use App\Http\Controllers\Auth\LoginController;

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
    return redirect()->route('login');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('login-submit', [LoginController::class, 'login'])->name('login-submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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
});
