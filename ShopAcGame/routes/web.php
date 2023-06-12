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
Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\backend\HomeComtroller::class, 'index'])->name('backend.home.index');
    Route::prefix('category')->group(function () {
        Route::get('/', [\App\Http\Controllers\backend\CategoryController::class, 'index'])->name('backend.category.index');
        Route::any('/create', [\App\Http\Controllers\backend\CategoryController::class, 'create'])->name('backend.category.create');
        Route::any('/store', [\App\Http\Controllers\backend\CategoryController::class, 'store'])->name('backend.category.store');
        Route::any('/edit{id}', [\App\Http\Controllers\backend\CategoryController::class, 'edit'])->name('backend.category.edit');
        Route::any('/update{id}', [\App\Http\Controllers\backend\CategoryController::class, 'update'])->name('backend.category.update');
        Route::any('/destroy{id}', [\App\Http\Controllers\backend\CategoryController::class, 'destroy'])->name('backend.category.destroy');
    });
});

