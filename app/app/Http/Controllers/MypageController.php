<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Like;
use App\Purchase;
use App\Follow;

class MypageController extends Controller
{
    //マイページ画面
    public function index(int $userid)
    {
        $user = Auth::user()->sale()->get();
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $user = new User;
        $sale = new Sale;

        $user_all = $user->all()->toArray();
        $sale_all = $sale->all()->toArray();

        return view('mypage', [
            'user' => $user_all,
            'sale' => $sale_all,
        ]);
    }

    //マイページ画面編集
    public function edit_form(int $id) 
    {
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $user = new User;

        $result = $user->find($id);

        return view('/mypage_edit', [
            'id' => $id,
            'result' => $result,
        ]);
    }

    //マイページ画面編集処理
    public function edit(int $id, Request $request)
    {
        $user = new User;
        $record = $user->find($id);
        

        // // name属性が'image'のinputタグをファイル形式にして、画像を本来の名前にする
        // $image= $request->file('image')->getClientOriginalName();
        // //同じファイル名の画像でも良いように日時をが王ファイルの名前につける
        // $img_name = date('Ymd_His').'_'.$image;
        // //public/pictureに画像を保存する
        // $request->file('image')->move('public/image/', $img_name);
        // // 上記処理にて保存した画像に名前を付け、userテーブルのimageカラムに、格納
        // $record->image = $img_name;

        $record->name = $request->name;
        $record->image = $request->image;
        $record->profile = $request->profile;

        //echo $record;
        $record->save();
        return view('mypage', ['id' => Auth::user()->id]);

    }

    //いいね商品一覧画面表示
    public function like_form(int $userid) 
    {
        // $user = Auth::user();
        // $user_id = $user->id;

        // //出品商品詳細ページ用にidでアイテム取得
        // $sale = Sale::find($id);

        // //自分はいいねを押してあるアイテムか判別
        // $my_like_check = Like::where('sale_id', $id)->where('user_id', $user->id)->get()->count();

        // //出品商品のいいねを押されている総数取得
        // $sale_likes = Like::where('sale_id', $id)->get()->count();

        // return view('like', [
        //     'like' => $like_all,
        // ]);

        $like = Auth::user()->like()->get();
        
        $like = new Like;

        $like_all = $like->all()->toArray();

        return view('like', [
            'like' => $like_all,
        ]);
    }

    //いいね商品一覧の処理
    public function like(int $userid)
    {
        // //引数$idの中にはアイテムのidが入ってくる
        // $user = Auth::user();
        // $sale = Sale::find($id);
        // //自分がいいねを押したアイデアかどうか。最初のハートの色判別用
        // //Likesテーブルの中に自分のidかつ該当のアイテムのidの情報があるかどうか（つまりその商品に自分がいいねをしてるかどうか）
        // $my_like = Like::where('user_id', $user->id)->where('sale_id', $id)->get();
        // //もし自分がいいね追加済みならDBから消す（いいね解除）
        // if ($my_like->count() > 0) {
        //     Like::where('user_id', $user->id)->where('sale_id', $id)->delete();
        // } else {
        //     //まだならDB追加
        //     Like::firstOrCreate(
        //         array(
        //             'user_id' => $user->id,
        //             'sale_id' => $sale->id,
        //         )
        //     );
        // }
    }

    //購入履歴一覧画面
    public function buyhistory_form(int $userid)
    {
        $buyhistory = Auth::user()->purchase()->get();
        
        $buyhistory = new Purchase;

        $buyhistory_all = $buyhistory->all()->toArray();

        return view('buyhistory', [
            'buyhistory' => $buyhistory_all,
        ]);
    }

    //フォロー一覧画面
    public function follow_form(int $userid)
    {
        $follow = Auth::user()->follow()->get();
        
        $follow= new Follow;

        $follow_all = $follow->all()->toArray();

        return view('follow', [
            'follow' => $follow_all,
        ]);
    }

    //フォロー一覧画面
    public function follow(int $userid)
    {
        //
    }

    //売上一覧画面
    public function sell_form(int $userid)
    {
        return view('sell');
    }
}