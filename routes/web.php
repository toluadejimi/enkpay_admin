<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});


Route::post('login',[AuthController::class, 'login']);

Route::get('admin-dashboard',[DashboardController::class, 'index']);

Route::get('customer',[CustomerController::class, 'index']);

Route::get('customer-details',[CustomerController::class, 'customer_details']);

Route::post('update-customer',[CustomerController::class, 'update_customer']);

Route::get('update-verification',[CustomerController::class, 'update_verification']);

Route::get('changeterminalstatus',[CustomerController::class, 'changeTerminalStatus']);



//settings
Route::get('settings',[SettingsController::class, 'index']);
Route::post('update-features',[SettingsController::class, 'update_fetures']);
Route::post('update-store',[SettingsController::class, 'update_store']);













Route::get('changeposstatus',[SettingsController::class, 'changePosStatus']);
Route::get('changedatastatus',[SettingsController::class, 'changeDataStatus']);
Route::get('bank-transfer',[SettingsController::class, 'changeBankStatus']);


//search
Route::post('date-search',[CustomerController::class, 'date_search']);
Route::post('transaction-search',[TransactionController::class, 'transaction_search']);







//Transaction
Route::get('transaction',[TransactionController::class, 'index']);
Route::get('create-new-trx',[TransactionController::class, 'create_new_trx']);
Route::post('update-trx',[TransactionController::class, 'update_trx']);





//











