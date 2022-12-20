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








Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('profile/create','add');
    Route::get('profile/edit','edit');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('news/create','add')->name('news.add');
        Route::post('news/create','create')->name('news.create');
});

Route::controller(ProfileController::class)->prefix('admin/profile')->name('admin.')->middleware('auth')->group(function () {
        Route::get('create','add')->name('profile.add');
        Route::post('create','create')->name('profile.create');
        Route::post('edit','update')->name('profile.update');
});

