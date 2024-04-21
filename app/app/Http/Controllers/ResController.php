<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Sale;
use App\User;
use App\Purchase;

class ResController extends Controller
{
   //出品詳細
   public function saleDetail(int $salesid) 
   {
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $sale = Sale::find($salesid);
        //モデルから全レコードを取得
        $sale_all = $sale->all()->toArray();

        return view('detail', [
            'sale' => $sale_all,
        ]);
    }

    //購入画面
    public function buy_form(int $salesid)
    {
        $sale = Sale::find($salesid);
        $purchase = new Purchase;

        $pur_all = $purchase->all()->toArray();

        return view('buy', [
            'purchase' => $pur_all,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //登録画面
    public function create_form() 
    {
        //
        return view('sale_create');
        
    }
    //登録処理
    public function create(Request $request)
    {
        $sale = new Sale;

        // name属性が'image'のinputタグをファイル形式にして、画像を本来の名前にする
        $picture= $request->file('picture')->getClientOriginalName();
        //同じファイル名の画像でも良いように日時をが王ファイルの名前につける
        $pic_name = date('Ymd_His').'_'.$picture;
        //public/pictureに画像を保存する
        $request->file('picture')->move('public/image/', $pic_name);
        // 上記処理にて保存した画像に名前を付け、userテーブルのimageカラムに、格納
        $sale->picture = $pic_name;

        $sale->name = $request->name;
        $sale->price = $request->price;
        $sale->comment = $request->comment;
        $sale->quality = $request->quality;

        //ログイン中のユーザー(Auth::user)が持つ(->)収入データ(income)として(->)入力値を保存(save(データ))
        Auth::user()->sale()->save($sale);
        //dd($request->id);
        //DBに保存
        //$sale->save();
        //画像をアップする画面へ戻る
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
