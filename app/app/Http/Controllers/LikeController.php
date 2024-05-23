<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Like;

class LikeController extends Controller
{
    public function index() {
        $data = [];
        //withCount('テーブル名')とすることで、リレーションの数を取得
        $sales = Sale::withCount('likes');
        $like_model = new Like;

        $data = [
            'sales' => $sales,
            'like_model' => $like_model,
        ];

        return view('like.index', $data);
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::use()->id;
        $sales_id = $request->sales_id;
        $like = new Like;
        $sale = Sale::findOrFll($sales_id);

        //すでにいいねをしているなら
        if($like->exists($id, $sales_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('sales_id', $sales_id)
                      ->where('user_id', $id)
                      ->delete();
        } else {
            //まだいいねをしていないなら、Likesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->sales_id = $request->sales_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //いいねの総数を取得
        $saleLikesCount = $sale->loadCount('likes')->like_count;

        //一つの変数にajaxを渡す値をまとめる
        $json = [
            'saleLikesCount' => $saleLikesCount,
        ];

        //ajaxに引数の値を返す。「ajaxlike.jsファイル」にパラメーターを返す
        return response()->json($json);
    }
}
