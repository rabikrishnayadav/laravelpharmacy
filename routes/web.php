<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomersController;

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

Route::get('/', [AuthController::class, 'login']);

Route::get('forgot', [AuthController::class, 'forgot']);
Route::post('forgot_post', [AuthController::class, 'forgot_post']);
Route::get('reset/{token}', [AuthController::class, 'getReset']);
Route::post('reset/{token}', [AuthController::class, 'postReset']);

Route::post('login_post', [AuthController::class, 'login_post']);

Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/customers', [CustomersController::class, 'customers']);
    Route::get('admin/customers/add', [CustomersController::class, 'add_customer']);
    Route::post('admin/customers/add', [CustomersController::class, 'insert_add_customer']);
    Route::get('admin/customers/edit/{id}', [CustomersController::class, 'edit_customer']);
    Route::post('admin/customers/edit/{id}', [CustomersController::class, 'update_customer']);
    Route::get('admin/customers/delete/{id}', [CustomersController::class, 'delete_customer']);

});

