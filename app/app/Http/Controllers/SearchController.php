<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\User; 

class SerchController extends Controller
{
    public function index(Request $request)
    {
        //検索フォームで入力された値を取得する
        $keyword = $request->input('keyword');

        $search = Sale::query();

        if(!empty($keyword))
        {
            $search->where('name', 'LIKE', "%{$keyword}%")
                   ->orWhere('comment', 'LIKE', "%{$keyword}%");
        }

        $sales = $search->get();

        //home.blade.phpへsales(一覧表示するデータ)とkeyword(検索ボックスのvalue値)を受け渡す
        return view('/', compact('sales', 'keyword'));
    }
    // public function index(Request $request)
    // {
    //     $query = User::query();
    //     //$request->input()で検索時に入力した項目を取得します。
    //     $search1 = $request->input('name');
    //     $search2 = $request->input('comment');
    //     $search3 = $request->input('price');

    //     // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
    //     if ($request->hasAny('name', 'comment') && $search1,$search2 != '') 
    //     {
    //         $query->where('name', 'like', '%'.$search1.'%')->->get();
    //     }

    //     // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した棋力と一致するカラムを取得します
    //     if ($request->has('strength') && $search1 != ('指定なし')) 
    //     {
    //         $query->where('strength', $search1)->get();
    //     }

    //      / プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した好きな戦法と一致するカラムを取得します
    //     if ($request->has('tactics') && $search2 != ('指定なし')) 
    //     {
    //         $query->where('tactics', $search2)->get();
    //     }

        
    //     //ユーザを1ページにつき10件ずつ表示させます
    //     $data = $query->paginate(10);

    //     return view('users.search',[
    //         'data' => $data
    //     ]);
    // }
}
