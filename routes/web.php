<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');


Auth::routes();


Route::name("backend.")->group(function(){
    // banner route
    Route::get('/dashboard', [BackendController::class, 'index'])->name('home');
    Route::resource('/banner', BannerController::class)->except(["show"]);
    Route::get('/banner/status/{banner}', [BannerController::class, 'status'])->name('banner.status');
    Route::get('/banner/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');
    Route::get('/banner/hard/delete/{id}', [BannerController::class, 'harddelete'])->name('banner.harddelete');

    // category route
    Route::resource('/category', CategoryController::class)->except(["edit","create"]);
    Route::get('/category/hard/delete/{id}', [CategoryController::class, 'harddelete'])->name('category.harddelete');

    //Product route size
    Route::resource('/size', SizeController::class)->except(["show", "create"]);

    //Product route color
    Route::resource('/color', ColorController::class)->except(["show", "create"]);

    //Product table route
    Route::resource('/product', ProductController::class)->except(["show"]);
});

