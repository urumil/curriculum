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
//出品商品の詳細画面
Route::get('/sale.detail/{id}', [ResController::class, 'saleDetail'])->name('detail');

//ログインもしくは会員登録してから表示可能
Route::group(['middleware' => 'auth'], function() {
    //マイページ画面表示
    Route::get('/mypage/{id}', [MypageController::class, 'index'])->name('mypage');
    //出品商品登録画面表示
    Route::get('/sale_create', [ResController::class, 'create_form'])->name('create');
    //出品商品登録処理
    Route::post('/sale_create', [ResController::class, 'create']);
    //マイページ画面編集画面
    Route::get('/mypage_edit/{id}', [MypageController::class, 'edit_form'])->name('edit');
    //マイページ画面編集処理
    Route::post('/mypage_edit/{id}', [MypageController::class, 'edit']);
    //いいね一覧画面表示
    Route::get('/like/{id}', [MypageController::class, 'like_form'])->name('like');
    //いいね編集処理
    Route::post('/like/{id}', [MypageController::class, 'like']);
    //購入画面表示
    Route::get('/buy/{id}', [ResController::class, 'buy_form'])->name('buy');
    //購入処理
    Route::post('/buy/{id}', [ResController::class, 'buy']);
    //購入画面表示
    Route::get('/buyhistory/{id}', [MypageController::class, 'buyhistory_form'])->name('buyhistory');
    //購入処理
    Route::post('/buyhistory/{id}', [MypageyController::class, 'buyhistory']);
    //フォロー一覧画面表示
    Route::get('/follow/{id}', [MypageController::class, 'follow_form'])->name('follow');
    //フォロー一覧処理
    Route::post('/follow/{id}', [MypageyController::class, 'follow']);
    //フォロー一覧画面表示
    Route::get('/sell/{id}', [MypageController::class, 'sell_form'])->name('sell');
    //フォロー一覧処理
    Route::post('/sell/{id}', [MypageyController::class, 'sell']);
});