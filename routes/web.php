<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EcMinuteController;

Route::get('/', function () {
    return 'Welcome to acma fontend';
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');



    ///////////EC MINUTES ROUTES////////////////
    Route::get('/all-ecminutes', [EcMinuteController::class, 'index'])->name('admin.list.ecminutes');
    Route::post('/add-ecminutes', [EcMinuteController::class, 'store'])->name('add.ecminutes');

});
