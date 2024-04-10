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
//出品商品の画面
Route::get('/sale.detail/{id}', [DisplayController::class, 'saleDetail'])->name('sale.detail');
