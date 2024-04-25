<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    //一般ユーザー一覧画面
    public function admin()
    {
        $user = new User;
        //モデルから全レコードを取得
        $user_all = $user->all()->toArray();
        
        //var_dump($user_all);

        return view('admin', [
            'user' => $user_all,
        ]);
    }
}
