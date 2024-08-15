<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CirculerController;
use App\Http\Controllers\Admin\MemberController;

Route::get('/', function () {
    return 'Welcome to acma fontend';
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // file manager routes

    Route::get('file-manager', [DashboardController::class, 'filemanager'])->name('file.manager');

    // circuler routes
    Route::resource('circulers', CirculerController::class);
    Route::get('circulers/{circuler}/delete-attachment/{attachment}', [CirculerController::class, 'deleteAttachment'])->name('circulers.delete-attachment');

    // member routes
    Route::resource('members', MemberController::class);

});
