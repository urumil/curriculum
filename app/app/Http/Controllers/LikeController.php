<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Like;

class LikeController extends Controller
{
    // //いいね実装
    // public function like(int $salesid, Request $request)
    // {
    //     $like = new Like;
    //     //$sale = new Sale;
    //     $like->sales_id = $salesid; 
    //     $like->user_id = Auth::user()->id;
    //     $like->save();
    //     return back();
    // }

    // //いいね商品一覧
    // public function likegoods(int $userid)
    // {
    //     $user = Auth::user()->like()->sale()->get();
    //     //Eloquent
    //     //モデルのインスタンスを生成、変数に代入
    //     $user = new User;
    //     $sale = new Sale;
    //     $like = new Like;

    //     $user_all = $user->all()->toArray();
    //     $sale_all = $sale->all()->toArray();
    //     $like_all = $like->all()->toArray();

    //     return view('likegoods', [
    //         'user' => $user_all,
    //         'sale' => $sale_all,
    //         'like' => $like_all,
    //     ]);
    // }

    // public function unlike(int $salesid, Request $request)
    // {
    //     $user=Auth::user()->id;
    //     $like=Like::where('sale_id', $sale->id)->where('user_id', $user)->first();
    //     $like->delete();
    //     return back();
    // }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $sales_id = $request->sales_id;
        $like = new Like;
        $sales = Sale::findOrFail($sales_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $sales_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('sales_id', $sales_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->sales_id = $request->sales_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $salesLikesCount = $sales->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'salesLikesCount' => $salesLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}
