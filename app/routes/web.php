<?php

use App\Http\Controllers\DisplayController;

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

Auth::routes();

Route::get('/', [DisplayController::class, 'index']);
//出品商品の詳細画面
Route::get('/sale/{id}/detail', [DisplayController::class, 'saleDetail'])->name('sale.detail');