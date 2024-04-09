<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Sale;


class DisplayController extends Controller
{
    public function index() {
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $sale = new Sale;
        //モデルから全レコードを取得
        $sale_all = $sale->all()->toArray();
        
        var_dump($sale_all);

        return view('home', [
            'sale' => $sale_all,
        ]);
    }

    //出品詳細
    public function saleDetail(int $salesid) {
        echo $salesid;
        $sale = Sale::find('id');

        return view('sale.detail');
    }

}
