<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;

class MypageController extends Controller
{
    //マイページ画面
    public function index()
    {
        // $id = Auth::id();
        // $user = DB::table('users')->find($id);
        // return view('my_page', ['my_user' => $user]);

        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $sale = new Sale;
        $user = new User;
        //モデルから全レコードを取得
        $sale_all = $sale->all()->toArray();
        $user_all = $user->all()->toArray();

        return view('mypage', [
            'sale' => $sale_all,
            'user' => $user_all,
        ]);
    }

    //マイページ画面編集
    public function edit_form() {
        //Eloquent
        //モデルのインスタンスを生成、変数に代入
        $user = new User;
        //モデルから全レコードを取得
        $user_all = $user->all()->toArray();

        return view('/mypage_edit', [
            'user' => $user_all,
        ]);
    }
    
}
