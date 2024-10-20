<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CirculerController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\EcMinuteController;
use App\Http\Controllers\Admin\AlldocController;
use App\Http\Controllers\Admin\PressCoverageController;
use App\Http\Controllers\Admin\PressReleaseController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\DocManagerController;
use App\Http\Controllers\Admin\EventMasterController;

// Route::get('/', function () {
//     return 'Welcome to acma fontend';
// });

Route::get('/', function () {
    return view('frontend.about-us');
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

    // gallery routes
    Route::resource('galleries', GalleryController::class);
    Route::get('gallery/delete-attachment/{attachment}', [GalleryController::class, 'deleteAttachment'])->name('gallery.delete-attachment');
    Route::post('galleries.change-status', [GalleryController::class, 'changeStatus'])->name('galleries.change-status');

    //EC minute route
    Route::get('ecminutes', [EcMinuteController::class, 'index'])->name('ecminutes.index');
    Route::post('ecminutes/store', [EcMinuteController::class, 'store'])->name('ecminutes.store');
    Route::delete('ecminutes/{ecMinute}', [EcMinuteController::class, 'destroy'])->name('ecminutes.destroy');

    // All docs
    Route::resource('alldocs', AlldocController::class);

    // Press Coverage
    Route::resource('presscoverages', PressCoverageController::class);

    // Press Release
    Route::resource('pressrelease', AlldocController::class);

    // Slider routes
    Route::resource('sliders', SliderController::class);

    // Publications routes
    Route::resource('publications', PublicationController::class);
    
    Route::resource('pressreleases', PressReleaseController::class);

    //Doc Manager
    Route::resource('docmanagers', DocManagerController::class);

    //Event Master 
    Route::resource('eventmasters', EventMasterController::class);
});
