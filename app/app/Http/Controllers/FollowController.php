<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Like;
use App\Purchase;
use App\Follow;

class FollowController extends Controller
{
    //
    //フォロー一覧画面
    public function index()
    {   
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('follow', [
            'user' => $users,
        ]);
        // $follow = new Follow;
        // $user = new User;

        // $follow_all = $follow->all()->toArray();
        // $user_all = $user->all()->toArray();

        // $follow = Follow::

        // return view('follow', [
        //     'follow' => $follow_all,
        //     'user' => $user_all,
        // ]);
    }

    //フォロー実装
    public function follow(int $userid, Request $request)
    {
        $follow = new Follow;

        $follow->user_id = Auth::user()->id;
        $follow->follow_id = $userid;
        $follow->save();
        return back();
    }
}
