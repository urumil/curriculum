<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ResController;
use App\Http\Controllers\MypageController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//ログイン関連情報を呼び出し
Auth::routes();
//ホーム画面表示
Route::get('/', [DisplayController::class, 'index']);
//出品商品の画面
Route::get('/sale.detail/{id}', [ResController::class, 'saleDetail'])->name('detail');

//ログインもしくは会員登録してから表示可能
Route::group(['middleware' => 'auth'], function() {
    //マイページ画面表示
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
    //マイページ画面編集画面
    Route::get('/mypage_edit', [MypageController::class, 'edit_form'])->name('edit');
    //マイページ画面編集処理
    Route::post('/mypage_edit', [MypageController::class, 'edit']);
    //出品商品登録画面表示
    Route::get('/sale_create', [ResController::class, 'create_form'])->name('create');
    //出品商品登録処理
    Route::post('/sale_create', [ResController::class, 'create']);
    

});