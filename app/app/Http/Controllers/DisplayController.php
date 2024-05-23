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
        //dd(1);
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $sale = new Sale;

        $keyword = $request->input('keyword'); //キーワードの値
        $pricelist = $request->input('pricelist'); //価格の値
       
        //$query = Sale::query();
        //キーワード検索
        if (isset($keyword))
        {
            $sale = Sale::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%")
                ->get();
        } else {
            //最新順に並べる
            $sale = Sale::latest()->get();
        }

        //プルダウン価格検索
        if ($pricelist == 1) {
            //$sale = Sale::latest()->get();

        } elseif ($pricelist == 2) {
            $sale = Sale::whereBetween('price', [0, 500])
                    ->latest()
                    ->get();
        } elseif ($pricelist == 3) {
            $sale = Sale::whereBetween('price', [501, 1000])
                    ->latest()
                    ->get();
        } elseif ($pricelist == 4) {
            $sale = Sale::whereBetween('price', [1001, 1500])
                    ->latest()
                    ->get();
        } elseif ($pricelist == 5) {
            $sale = Sale::where('price', '>', 1501)
                    ->latest()
                    ->get();
        } else {
            //最新順に並べる
            $sale = Sale::latest()->get();
        }

        //dd($keyword,$pricelist);
        //dd($pricelist);
        return view('home', [
            'sale' => $sale,
            'keyword' => $keyword,
            'pricelist' => $pricelist,
        ]);
    }

}
