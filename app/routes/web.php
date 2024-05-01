<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ResController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use App\Sale;
use App\User;
use App\Purchase;


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
//検索機能
Route::get('/', [SearchController::class, 'index'])->name('search');
//出品商品の詳細画面
Route::get('/sale.detail/{id}', [ResController::class, 'saleDetail'])->name('detail');

//ログインもしくは会員登録してから表示可能
Route::group(['middleware' => 'auth'], function() {

    //一般ユーザー
    //Route::group(['middleware' => 'can:view,user'], function() {
        //ホーム画面表示
        Route::get('/', [DisplayController::class, 'index']);
        //出品商品の詳細画面
        Route::get('/sale.detail/{id}', [ResController::class, 'saleDetail'])->name('detail');
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
        //退会（論理削除）
        Route::get('/mypage_delete/{id}', [MypageController::class, 'delete_form'])->name('delete');
        //いいね機能「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
        Route::post('ajaxlike', [LikeController::class, 'ajaxlike'])->name('sales.ajaxlike');
        //いいね
        Route::get('/like/{id}', [LikeController::class, 'like'])->name('like');
        //いいねを取り消す
        Route::get('/unlike/{id}', [LikeController::class, 'unlike'])->name('unlike');
        //マイページ画面表示
        Route::get('/likegoods/{id}', [LikeController::class, 'likegoods'])->name('likegoods');
        //購入画面表示
        Route::get('/buy/{id}', [ResController::class, 'buy_form'])->name('buy');
        //購入処理
        Route::post('/buy/{id}', [ResController::class, 'buy']);
        //購入確認表示
        Route::get('/check/{id}', [ResController::class, 'check_form'])->name('check');
        //購入確認処理
        Route::post('/check/{id}', [ResController::class, 'check']);
        //購入履歴画面表示
        Route::get('/buyhistory/{id}', [MypageController::class, 'buyhistory_form'])->name('buyhistory');
        //購入履歴処理
        Route::post('/buyhistory/{id}', [MypageController::class, 'buyhistory']);
        //フォロー一覧画面表示
        Route::get('/followuser/{id}', [MypageController::class, 'followuser'])->name('followuser');
        //フォロー実装
        Route::get('/follow/{id}', [MypageController::class, 'follow'])->name('follow');
        //フォロー用のユーザー画面
        Route::get('/user/{id}', [MypageController::class, 'user_form'])->name('user');
        //売上一覧画面表示
        Route::get('/sell/{id}', [MypageController::class, 'sell_form'])->name('sell');
        //売上処理
        Route::post('/sell/{id}', [MypageController::class, 'sell']);
        
    //});
    

    //管理者用
    //Route::group(['middleware' => 'can:view,admin'], function() {
        //ホーム画面表示
        //Route::get('/', [DisplayController::class, 'index']);
    //});
});