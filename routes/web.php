<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\WareHouseController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_check'])->name('register_check');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_check'])->name('login_check');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix'=> 'users'], function(){

    Route::get('/home', [AdminController::class, 'home'])->name('admin_home');
    Route::get('/logs', [AdminController::class, 'logs'])->name('admin_logs');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin_settings');
    Route::post('/settings', [AdminController::class, 'settings_check'])->name('admin_settings_check');
    Route::post('/update-settings', [AdminController::class, 'update_settings_check'])->name('admin_update_settings_check');


    Route::get('/users', [AdminController::class, 'users'])->name('admin_users');
    Route::post('/users', [AdminController::class, 'users_check'])->name('admin_users_check');
    Route::post('/delete-users', [AdminController::class, 'delete_user'])->name('admin_delete_user');
    Route::post('/delete-users', [AdminController::class, 'delete_user'])->name('admin_delete_user');
    Route::post('/find-user', [AdminController::class, 'find_user'])->name('admin_find_user');
    Route::post('/update-user', [AdminController::class, 'update_user'])->name('admin_update_user');
    Route::post('/find-category', [AdminController::class, 'find_category'])->name('admin_find_category');

    //FORMS
    Route::get('/forms', [AdminController::class, 'forms'])->name('admin_forms');
    Route::get('/print-forms/{form}', [AdminController::class, 'print_forms'])->name('admin_print_forms');


    Route::get('/departments', [AdminController::class, 'departments'])->name('admin_departments');
    Route::post('/departments', [AdminController::class, 'departments_check'])->name('admin_departments_check');
    Route::post('/delete-department', [AdminController::class, 'delete_department'])->name('admin_delete_department');
    Route::post('/find-department', [AdminController::class, 'find_department'])->name('admin_find_department');
    Route::post('/update-department', [AdminController::class, 'update_department'])->name('admin_update_department');


    Route::get('/supplies', [AdminController::class, 'supplies'])->name('admin_supplies');
    Route::post('/supplies', [AdminController::class, 'supplies_check'])->name('admin_supplies_check');
    Route::post('/find-supplies', [AdminController::class, 'find_supplies'])->name('admin_find_supplies');
    Route::post('/update-supplies', [AdminController::class, 'update_supplies'])->name('admin_update_supplies');
    Route::get('/print-supplies/{id}', [AdminController::class, 'print_supplies'])->name('admin_print_supplies');

    //REQUEST ADMIN
    Route::get('/request-supplies', [AdminController::class, 'request_supplies'])->name('admin_request_supplies');
    Route::post('/approve-supplies', [AdminController::class, 'approve_supplies'])->name('admin_approve_supplies');
    Route::post('/cancel-supplies', [AdminController::class, 'cancel_supplies'])->name('admin_cancel_supplies');
    Route::post('/restock-supplies', [AdminController::class, 'restock_supplies'])->name('admin_restock_supplies');

    //WAREHOUSE 
    Route::get('/scan-qr-code', [AdminController::class, 'scan_qr_code'])->name('admin_scan_qr_code');
    Route::post('/scan-qr-code', [AdminController::class, 'scan_qr_code_check'])->name('admin_scan_qr_code_check');
    Route::get('/warehouse-request-supplies', [AdminController::class, 'warehouse_request_supplies'])->name('admin_warehouse_request_supplies');


    //DEPARTMENT
    Route::get('/department-request', [DepartmentController::class, 'request'])->name('department_request');
    Route::post('/department-request', [DepartmentController::class, 'request_check'])->name('department_request_check');
    Route::get('/department-history', [DepartmentController::class, 'history'])->name('department_history');

    Route::post('/received-supply', [DepartmentController::class, 'received_supply'])->name('department_received_supply');
    Route::post('/return-supply', [DepartmentController::class, 'return_supply'])->name('department_return_supply');

});