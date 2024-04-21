<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Sale;


class DisplayController extends Controller
{
    public function index() {

        // //ログイン中ユーザー(Auth::user)が持つ(->)出品商品データ(sales)を得る(get)
        // $sales = Auth::user()->sales()->get();
        // $purchases = Auth::user()->purchases()->get();
        // $likes = Auth::user()->likes()->get();
        // $follows = Auth::user()->follows()->get();

        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $sale = new Sale;
        //モデルから全レコードを取得
        $sale_all = $sale->all()->toArray();
        
        //var_dump($sale_all);

        return view('home', [
            'sale' => $sale_all,
        ]);
    }

}
