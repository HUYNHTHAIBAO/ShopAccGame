<?php

use Illuminate\Support\Facades\Route;

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

// frontend
Route::get('/', [\App\Http\Controllers\frontend\HomeController::class, 'index'])->name('frontend.home.index');
Route::get('/dich-vu', [\App\Http\Controllers\frontend\ServicesController::class, 'index'])->name('frontend.services.index'); // tất cả dịch vụ
Route::get('/dich-vu/{slug}', [\App\Http\Controllers\frontend\SubServicesController::class, 'index'])->name('frontend.sub_services.index'); // dịch vụ con
Route::get('/danh-muc', [\App\Http\Controllers\frontend\CategoryController::class, 'index'])->name('frontend.category.index'); // tất cả danh mục
Route::get('/danh-muc/{slug}', [\App\Http\Controllers\frontend\SubCategoryController::class, 'index'])->name('frontend.sub_category.index'); // danh mục con

// backend
Route::get('/admin', [\App\Http\Controllers\backend\HomeComtroller::class, 'index'])->name('frontend.home.index');


