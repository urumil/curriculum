<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Sale;
use Gate;

class AdminController extends Controller
{
    //管理者TOPページ（ユーザーリスト）
    public function showAdminPage()
    {
        //管理者以外の一般ユーザーを表示
        $user = User::where('group', '!=', 0)->get();


        //var_dump($user);
        return view('admin', [
            'user' => $user,
        ]);
    }

    //管理者用ユーザー詳細
    public function showUserPage(int $id)
    {

        $user = User::with('sale')->where('id', $id)->first();
        $sale = $user->sale()->get();
        //論理削除済みのものを取得
        $delete = Sale::onlyTrashed()->get();

        //var_dump($sale);

        return view('admuser', [
            'user' => $user,
            'sale' => $sale,
            'delete' => $delete,
        ]);

    }

    //管理者用出品商品詳細
    public function showSalePage(int $id)
    {
        $sale = Sale::with('user')->where('id', $id)->first();

        // //$like = new Like;
    
        // $data = [];
        // // ユーザの投稿の一覧を作成日時の降順で取得
        // //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        // //$sales = Sale::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);

        // $data = [
        //         'sale' => $sale,
        //         'like'=> $like,
        //     ];

        //var_dump($sale);
        return view('admsale', [
            'sale' => $sale,
        ]);
    }

    //出品商品の非表示の処理
    public function softdel_form(int $id)
    {
        $sale = Sale::find($id);
        $sale->fill([
            'del_flg' => 1
        ])->save();
        $sale->delete();
        
        return redirect('/');
    }

    //非表示した出品商品の復元
    public function restore(int $id)
    {
        Sale::onlyTrashed()->find($id)->restore();

        return redirect('/');
    }
}
