<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Gate;

class AdminController extends Controller
{
    //管理者TOPページ（ユーザーリスト）
    public function showAdminPage()
    {
        //管理者以外の一般ユーザーを表示
        $user = User::where('group', '!=', 0)->get();


        //var_dump($user);
        return view('admin', [
            'user' => $user,
        ]);
    }

    //一般ユーザー一覧画面
    public function admin()
    {
        $user = new User;
        //モデルから全レコードを取得
        $user_all = $user->all()->toArray();
        
        //var_dump($user_all);

        return view('home', [
            'user' => $user_all,
        ]);
    }
}
