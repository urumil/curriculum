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
        $top = $request->input('top');//価格の範囲検索
        $down = $request->input('down');//価格の範囲検索
       
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

        //価格の範囲検索
        if (isset($top) && isset($down))
        {
            $sale = Sale::whereBetween('price', [$top, $down])
                    ->latest()
                    ->get();
        } elseif(isset($top) && !isset($down)) {
            $sale = Sale::where('price', '>=', $top)
                    ->latest()
                    ->get();
        } elseif(!isset($top) && isset($down)) {
            $sale = Sale::where('price', '<=', $down)
                    ->latest()
                    ->get();
        } else {
            //最新順に並べる
            $sale = Sale::latest()->get();
        }

        //キーワード検索と価格検索を同時に実行して絞る
        if (isset($keyword) && isset($top) && isset($down))
        {
            $sale = Sale::whereBetween('price', [$top, $down])
                    ->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('comment', 'LIKE', "%{$keyword}%")
                    ->latest()
                    ->get();
        } elseif(isset($keyword) && !isset($top) && !isset($down))
        {
            $sale = Sale::where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('comment', 'LIKE', "%{$keyword}%")
                    ->latest()
                    ->get();
        } elseif(isset($keyword) && !isset($top))
        {
            $sale = Sale::where('price', '<=', $down)
                    ->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('comment', 'LIKE', "%{$keyword}%")
                    ->latest()
                    ->get();
        } elseif(isset($keyword) && !isset($down))
        {
            $sale = Sale::where('price', '>=', $top)
                    ->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('comment', 'LIKE', "%{$keyword}%")
                    ->latest()
                    ->get();
        } 


        //dd($keyword,$pricelist);
        //dd($keyword,$top,$down);
        return view('home', [
            'sale' => $sale,
            'keyword' => $keyword,
            //'pricelist' => $pricelist,
            'top' => $top,
            'down' => $down,
        ]);
    }

}
