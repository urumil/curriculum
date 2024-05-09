<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use Gate;


class DisplayController extends Controller
{
    public function index(Request $request) {

        // //ログイン中ユーザー(Auth::user)が持つ(->)出品商品データ(sales)を得る(get)
        // $sales = Auth::user()->sales()->get();
        // $purchases = Auth::user()->purchases()->get();
        // $likes = Auth::user()->likes()->get();
        // $follows = Auth::user()->follows()->get();

        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $sale = new Sale;
        //モデルから全レコードを取得
        // $sale_all = $sale->all()->toArray();
        
        //キーワード検索
        if (isset($request->keyword)) 
        {
            $sale = Sale::where('name', $request->keyword)
                ->orWhere('comment', $request->keyword)
                ->get();
        } else {
            //最新順に並べる
            $sale = Sale::latest()->get();
        }

        // $sale = new Sale;
        // //Saleモデルで定義した関数を呼び出す
        // $pricelist = $sale->pricelist();

        //プルダウン価格検索
        if (isset($request->pricelist)) 
        {
            $sale = Sale::where('price', $request->pricelist)
                        ->whereBetween('price', [0, 999])
                        ->get();
        } else {
            //最新順に並べる
            $sale = Sale::latest()->get();
        }

        return view('home', [
            'sale' => $sale,
            'keyword' => $request->keyword,
            'pricelist' => $request->pricelist,
        ]);
    }

}
