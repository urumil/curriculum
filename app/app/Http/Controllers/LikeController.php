<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Like;

class LikeController extends Controller
{
    //いいね実装
    public function like(int $salesid, Request $request)
    {
        $like = new Like;
        //$sale = new Sale;
        $like->sales_id = $salesid; 
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }

    //いいね商品一覧
    public function likegoods(int $userid)
    {
        $user = Auth::user()->like()->sale()->get();
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $user = new User;
        $sale = new Sale;
        $like = new Like;

        $user_all = $user->all()->toArray();
        $sale_all = $sale->all()->toArray();
        $like_all = $like->all()->toArray();

        return view('likegoods', [
            'user' => $user_all,
            'sale' => $sale_all,
            'like' => $like_all,
        ]);
    }

    public function unlike(int $salesid, Request $request)
    {
        $user=Auth::user()->id;
        $like=Like::where('sale_id', $sale->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }
}
