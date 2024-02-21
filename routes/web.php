<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminTransaksiDetailController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminTransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'dologin'])->middleware('guest');
Route::get('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    $data = [
        'content'   => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
})->middleware('auth');



Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function(){
        $data = [
            'content'   => 'admin.dashboard.index'
        ];
        return view('admin.layouts.wrapper', $data);
    });

    Route::get('transaksi/detail/selesai/{id}', [AdminTransaksiDetailController::class, 'done']);
    Route::get('transaksi/detail/delete', [AdminTransaksiDetailController::class, 'delete']);
    Route::post('transaksi/detail/create', [AdminTransaksiDetailController::class, 'create']);
    Route::resource('/transaksi', AdminTransaksiController::class);
    Route::resource('/produk', AdminProdukController::class);
    Route::resource('/user', AdminUserController::class);
});