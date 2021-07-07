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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('customer')->group(function () {
    Route::get('index', function () {
        // Hiển thị danh sách khách hàng
        return view('modules.customer.index');
    });

    Route::get('create', function () {
        // Hiển thị Form tạo khách hàng
    });

    Route::post('store', function () {
        // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form
    });

    Route::get('{id}/show', function () {
        // Hiển thị thông tin chi tiết khách hàng có mã định danh id
    });

    Route::get('{id}/edit', function () {
        // Hiển thị Form chỉnh sửa thông tin khách hàng
    });

    Route::patch('{id}/update', function () {
        // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
    });

    Route::delete('{id}', function () {
        // Xóa thông tin dữ liệu khách hàng
    });
});

Route::get('customer', [\App\Http\Controllers\CustomerController::class, 'index']);

Route::prefix('/tasks')->group(function (){
    Route::get('/', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.create');
    Route::post('/', [\App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{taskId}', [\App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.show');
    Route::get('/{taskId}/edit', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.edit');
    Route::put('/{taskId}', [\App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{photo}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
});
