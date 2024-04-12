<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ResController;


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
Route::get('/sale.detail/{id}', [ResController::class, 'saleDetail'])->name('detail');
//出品商品の詳細画面
//Route::get('/show/{id}', [DisplayController::class, 'show'])->name('sale.show');

