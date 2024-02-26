<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PurchasesController;

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
    // Customer Manage
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/customers', [CustomersController::class, 'customers']);
    Route::get('admin/customers/add', [CustomersController::class, 'add_customer']);
    Route::post('admin/customers/add', [CustomersController::class, 'insert_add_customer']);
    Route::get('admin/customers/edit/{id}', [CustomersController::class, 'edit_customer']);
    Route::post('admin/customers/edit/{id}', [CustomersController::class, 'update_customer']);
    Route::get('admin/customers/delete/{id}', [CustomersController::class, 'delete_customer']);

    // Medicines Manage
    Route::get('admin/medicines', [MedicinesController::class, 'medicines']);
    Route::get('admin/medicines/add', [MedicinesController::class, 'add_medicine']);
    Route::post('admin/medicines/add', [MedicinesController::class, 'insert_add_medicine']);
    Route::get('admin/medicines/edit/{id}', [MedicinesController::class, 'edit_medicine']);
    Route::post('admin/medicines/edit/{id}', [MedicinesController::class, 'update_medicine']);
    Route::get('admin/medicines/delete/{id}', [MedicinesController::class, 'delete_medicine']);

    // Medicines Stock Manage
    Route::get('admin/medicines_stock', [MedicinesController::class, 'medicines_stock_list']);
    Route::get('admin/medicines_stock/add', [MedicinesController::class, 'medicines_stock_add']);
    Route::post('admin/medicines_stock/add', [MedicinesController::class, 'medicines_stock_store']);
    Route::get('admin/medicines_stock/edit/{id}', [MedicinesController::class, 'edit_medicines_stock']);
    Route::post('admin/medicines_stock/edit/{id}', [MedicinesController::class, 'update_medicines_stock']);
    Route::get('admin/medicines_stock/delete/{id}', [MedicinesController::class, 'delete_medicines_stock']);

    // Suppliers Manage
    Route::get('admin/suppliers', [SuppliersController::class, 'suppliers']);
    Route::get('admin/suppliers/add', [SuppliersController::class, 'add_supplier']);
    Route::post('admin/suppliers/add', [SuppliersController::class, 'insert_add_supplier']);
    Route::get('admin/suppliers/edit/{id}', [SuppliersController::class, 'edit_supplier']);
    Route::post('admin/suppliers/edit/{id}', [SuppliersController::class, 'update_supplier']);
    Route::get('admin/suppliers/delete/{id}', [SuppliersController::class, 'delete_supplier']);

    // Invoices Manage
    Route::get('admin/invoices', [InvoicesController::class, 'invoices']);
    Route::get('admin/invoices/add', [InvoicesController::class, 'add_invoice']);
    Route::post('admin/invoices/add', [InvoicesController::class, 'save_invoice']);
    Route::get('admin/invoices/edit/{id}', [InvoicesController::class, 'edit_invoice']);
    Route::post('admin/invoices/edit/{id}', [InvoicesController::class, 'update_invoice']);
    Route::get('admin/invoices/delete/{id}', [InvoicesController::class, 'delete_invoice']);

    // Invoices Manage
    Route::prefix('admin/purchases/')->group(function(){
        Route::get('', [PurchasesController::class, 'purchases']);
        Route::get('add', [PurchasesController::class, 'add_purchases']);
        Route::post('add', [PurchasesController::class, 'save_purchases']);
        Route::get('edit/{id}', [PurchasesController::class, 'edit_purchases']);
        Route::post('edit/{id}', [PurchasesController::class, 'update_purchases']);
        Route::get('delete/{id}', [PurchasesController::class, 'delete_purchases']);
    });
    

});

