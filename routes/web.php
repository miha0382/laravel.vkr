<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransactionController;
use App\Models\Customer;
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


Route::middleware('auth')->group(function ()
{
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/customers', [MainController::class, 'customers'])->name('customers');
    Route::post('/customers/update/{id}', [CustomerController::class, 'updateCustomer'])->name('update-customer');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete-customer');
    Route::get('/customers/{id}', [ContactController::class, 'getContact'])->name('get-contact');
    Route::post('/customers/{id}/add-contact', [ContactController::class, 'addContact'])->name('add-contact');
    Route::post('/customers/{id}/update-contact', [ContactController::class, 'updateContact'])->name('update-contact');
    Route::get('/customers/{id}/delete-contact', [ContactController::class, 'deleteContact'])->name('delete-contact');
    Route::get('/customers/search/search-params', [CustomerController::class, 'search'])->name('search');
    Route::get('/customers/sort/{col}/asc', [CustomerController::class, 'sortByAsc'])->name('sort-by-asc');
    Route::get('/customers/sort/{col}/desc', [CustomerController::class, 'sortByDesc'])->name('sort-by-desc');

    Route::get('/services', [MainController::class, 'services'])->name('services');
    Route::post('/services/add', [ServiceController::class, 'addService'])->name('add-service');
    Route::post('/services/update/{id}', [ServiceController::class, 'updateService'])->name('update-service');
    Route::get('services/delete/{id}', [ServiceController::class, 'deleteService'])->name('delete-service');

    Route::get('/get-services', [ServiceController::class, 'getServices']);
    Route::post('/calculate', [CalculatorController::class, 'calculate']);

    Route::get('/options', [MainController::class, 'options'])->name('options');
    Route::post('/options/save', [OptionController::class, 'saveOptions'])->name('save-options');
    Route::get('/options/backup', [OptionController::class, 'backupOptions'])->name('backup-options');

    Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');
    Route::post('/save-transaction', [TransactionController::class, 'saveTransaction']);

    Route::get('/calculator', function(){
        return view('calculator-page');
    })->name('calculator');

});

Route::middleware('guest')->group(function ()
{
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('home');

//Auth::Routes();





