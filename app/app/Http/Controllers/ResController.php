<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\User;

class ResController extends Controller
{
   //出品詳細
   public function saleDetail(int $salesid) 
   {
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $sale = new Sale;
        //モデルから全レコードを取得
        $sale_all = $sale->all()->toArray();

        return view('detail', [
            'sale' => $sale_all,
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
        $user = new User;

        // name属性が'image'のinputタグをファイル形式にして、画像を本来の名前にする
        $image = $request->file('image')->getClientOriginalName();
        //同じファイル名の画像でも良いように日時をが王ファイルの名前につける
        $name = date('Ymd_His').'_'.$image;
        //public/imageに画像を保存する
        $request->file('image')->move('public/image/');
        // 上記処理にて保存した画像に名前を付け、userテーブルのimageカラムに、格納
        $user->image = $image;

        $user->name = $request->name;
        $user->name = $request->name;
        //DBに保存
        $user->save();
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
