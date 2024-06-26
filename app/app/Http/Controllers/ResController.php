<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Like;
use App\Sale;
use App\User;
use App\Purchase;

class ResController extends Controller
{
   //出品詳細
   public function saleDetail(int $id) 
   {
        $sale = Sale::with('user')->where('id', $id)->first();
        
        //withCount('テーブル名')とすることで、リレーションの数を取得
        $sales = Sale::withCount('likes')->find($id);
        //dd($sales);
        $like_model = new Like;


        return view('detail', [
            'sale' => $sale,
            'sales' => $sales,
            'like_model' => $like_model,

        ]);
    }

    //購入画面
    public function buy(int $id, Request $request)
    {
        $sale = Sale::with('user')->where('id', $id)->first();

        return view('buy', [
            'sale' => $sale,
            'request' => $request,
        ]);
    }
    //確認画面
    public function confirm(int $id, Request $request)
    {
        $sale = Sale::with('user')->where('id', $id)->first();

        //バリデーション
        $request->validate([
            'name' => 'required',
            'tel' => 'required|integer',
            'comment' => 'required',
            'picture' => 'required|image',
            'quality' => 'required|in:未使用,目立った傷や汚れなし,傷や汚れあり',
        ]);

        //セッションに書き込む
        $contact = $request->all();
        $request->session()->put('contact', $contact);

        //var_dump($contact);
        return view('check', [
            'sale' => $sale,
            'contact' => $contact,
            'id' => $id,
        ]); 
    }

    //完了画面
    public function send(int $id, Request $request)
    {
        $sale = Sale::with('user')->where('id', $id)->first();
        //セッションに書き込む
        $val = $request->session()->get('contact');

        $purchase = new Purchase;
        // $valのデータを$purchaseにフィルイン
        $purchase->fill($val);
        //saleからデータを引っ張る
        $purchase->good = $sale->name;
        $purchase->sales_id = $sale->id;

        Auth::user()->purchase()->save($purchase);
        
        return view('thanks', compact('purchase'));
    }

    //購入一覧画面
    public function buyhistory_form(int $id)
    {
        // $user = new User;
        // $purchases = new Purchases;
        // $sale = new Sale;

        // $purchases = Auth::user()->purchases()->get();
        // $sale = Auth::user()->sale()->get();
        // $user = Auth::user()->get();

        return view('buyhistory', [
            'purchases' => $purchases,
            'sale' => $sale,
            'user' => $user,
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

        //バリデーション
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'comment' => 'required',
            'picture' => 'required|image',
            'quality' => 'required|in:未使用,目立った傷や汚れなし,傷や汚れあり',
        ], [
            'quality.required' => '商品の状態を選択してください。',
            'quality.in' => '選択された商品の状態が無効です。',
        ]);

        // name属性が'image'のinputタグをファイル形式にして、画像を本来の名前にする
        $picture= $request->file('picture')->getClientOriginalName();
        //同じファイル名の画像でも良いように日時をが王ファイルの名前につける
        $pic_name = date('Ymd_His').'_'.$picture;
        //public/imageに画像を保存する
        $request->file('picture')->move('public/image/', $pic_name);
        // 上記処理にて保存した画像に名前を付け、userテーブルのimageカラムに、格納
        $sale->picture = $pic_name;

        $sale->name = $request->name;
        $sale->price = $request->price;
        $sale->comment = $request->comment;
        $sale->quality = $request->quality;

        //ログイン中のユーザー(Auth::user)が持つ(->)収入データ(income)として(->)入力値を保存(save(データ))
        Auth::user()->sale()->save($sale);
        return redirect('/');
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
