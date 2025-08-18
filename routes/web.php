<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomersController;

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
    return view('landing');
})->name('/');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');


Route::post('login-submit', [LoginController::class, 'login'])->name('login-submit');
Route::post('submit', [RegisterController::class, 'create'])->name('submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('/');
    })->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Invoice routes
    Route::resource('invoice', 'InvoiceController');

    // Customer routes
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::get('/customers/add', [CustomersController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomersController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomersController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy');
});
