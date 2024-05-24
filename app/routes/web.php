<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ResController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ToppageController;

use Illuminate\Support\Facades\Auth;

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

//ホーム画面表示
Route::get('/', [DisplayController::class, 'index']);
//出品商品の詳細画面
Route::get('/sale.detail/{id}', [ResController::class, 'saleDetail'])->name('detail');

//ログイン関連情報を呼び出し
Auth::routes();
//ログインもしくは会員登録してから表示可能
Route::group(['middleware' => 'auth'], function() {
    //Route::middleware(['auth', 'redirect.based.on.group'])->group(function () {
    
    //一般ユーザー
    Route::group(['middleware' => ['auth', 'can:general']], function() {
        
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

        //出品商品の詳細画面
        Route::get('/mysale.detail/{id}', [MypageController::class, 'saleDetail'])->name('mysaledetail');
        //マイページ用出品商品詳細編集画面
        Route::get('/detail_edit/{id}', [MypageController::class, 'detailedit_form'])->name('saleedit');
        //確認画面
        Route::post('/edit_check/{id}', [MypageController::class, 'edit_check'])->name('check');
        //マイページ用出品商品詳細編集処理
        Route::post('/detail_complete/{id}', [MypageController::class, 'complete'])->name('complete');

        //出品商品の削除(物理削除)
        Route::get('/sale_delete/{id}', [MypageController::class, 'sale_delete'])->name('saledelete');

        //退会（論理削除）
        Route::get('/mypage_delete/{id}', [MypageController::class, 'delete_form'])->name('delete');

        //いいね機能「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
        Route::post('/ajaxlike', [LikeController::class, 'ajaxlike'])->name('sales.ajaxlike');
        //いいねした商品の一覧
        Route::get('/likegoods/{id}', [LikeController::class, 'likegoods'])->name('likegoods');

        //購入画面表示
        Route::get('/buy/{id}', [ResController::class, 'buy'])->name('buy');
        //確認処理
        Route::post('/check/{id}', [ResController::class, 'confirm'])->name('confirm');
        //完了画面
        Route::post('/thanks/{id}', [ResController::class, 'send'])->name('send');

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
        //フォローを外す（物理削除）
        Route::get('/delete_follow/{id}', [MypageController::class, 'del_follow'])->name('delete_follow');

        //売上一覧画面表示
        Route::get('/sell/{id}', [MypageController::class, 'sell_form'])->name('sell');
        //売上処理
        Route::post('/sell/{id}', [MypageController::class, 'sell']);
        
    });
    

    //管理者用
    Route::group(['middware' => ['auth', 'can:admin']], function() {
        //ホーム画面表示（ユーザーリスト）
        Route::get('/admin', [AdminController::class, 'showAdminPage']);
        //管理者用ユーザー詳細画面
        Route::get('/admuser/{id}', [AdminController::class, 'showUserPage'])->name('admuser');
        //管理者用出品商品詳細画面
        Route::get('/admsale/{id}', [AdminController::class, 'showSalePage'])->name('admsale');
        //出品商品の非表示（論理削除）
        Route::get('/softdelete_sale/{id}', [AdminController::class, 'softdel_sale'])->name('softdelete_sale');
        //出品商品の復元
        Route::get('/restore/{id}', [AdminController::class, 'restore'])->name('restore');
        //ユーザーの利用停止（論理削除）
        Route::get('/softdelete_user/{id}', [AdminController::class, 'softdel_user'])->name('softdelete_user');
        //利用停止中ユーザーの復元
        Route::get('/restore_user/{id}', [AdminController::class, 'restore_user'])->name('restore_user');
    });
//});
});