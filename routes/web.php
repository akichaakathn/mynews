<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Route::controller(AAAController::class)->group(function(){
    Route::get('XXX','bbb');
});

Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('profile/create','add');
    Route::get('profile/edit','edit');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(NewsController::class)->prefix('admin')->group(function() {
        Route::get('news/create','add')->middleware('auth');
});

Route::controller(ProfileController::class)->prefix('admin/profile')->group(function() {
    Route::get('create','add')->middleware('auth');
    Route::get('edit','add')->middleware('auth');
});

