<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login'])->name('login');


Route::group(['prefix'=> 'users'], function(){

    Route::get('/home', [AdminController::class, 'home'])->name('admin_home');

});