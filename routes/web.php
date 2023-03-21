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

Route::group(['prefix'=> 'users'], function(){

    Route::get('/home', [AdminController::class, 'home'])->name('admin_home');

});