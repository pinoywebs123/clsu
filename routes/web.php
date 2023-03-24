<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

    Route::get('/users', [AdminController::class, 'users'])->name('admin_users');
    Route::post('/users', [AdminController::class, 'users_check'])->name('admin_users_check');
    Route::post('/delete-users', [AdminController::class, 'delete_user'])->name('admin_delete_user');
    Route::post('/delete-users', [AdminController::class, 'delete_user'])->name('admin_delete_user');
    Route::post('/find-user', [AdminController::class, 'find_user'])->name('admin_find_user');
    Route::post('/update-user', [AdminController::class, 'update_user'])->name('admin_update_user');


    Route::get('/departments', [AdminController::class, 'departments'])->name('admin_departments');
    Route::post('/departments', [AdminController::class, 'departments_check'])->name('admin_departments_check');
    Route::post('/delete-department', [AdminController::class, 'delete_department'])->name('admin_delete_department');
    Route::post('/find-department', [AdminController::class, 'find_department'])->name('admin_find_department');
    Route::post('/update-department', [AdminController::class, 'update_department'])->name('admin_update_department');


    Route::get('/supplies', [AdminController::class, 'supplies'])->name('admin_supplies');

});