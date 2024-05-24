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
        $user = User::find($userid);
        $sale = Auth::user()->sale()->latest()->get();

        return view('mypage', [
            'user' => $user,
            'sale' => $sale,
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

        $request->validate([
            'name' => 'required',
        ]);

        if(isset($request->image)) {
            //name属性が'image'のinputタグをファイル形式にして、画像を本来の名前にする
            $image = $request->file('image')->getClientOriginalName();
            //同じファイル名の画像でも良いように日時をが王ファイルの名前につける
            $img_name = date('Ymd_His').'_'.$image;
            //storage/imagesに画像を保存する
            $request->file('image')->move('public/image/', $img_name);
            //上記処理にて保存した画像に名前を付け、userテーブルのimageカラムに、格納
            //$user->image = $img_name;
            $request->image = $img_name;
            $record->image = $request->image;
        } else {
            $record->image = $record->image;
        }
        
        $record->name = $request->name;
        $record->profile = $request->profile;

        //echo $record;
        $record->save();
        //return view('mypage', ['id' => Auth::user()->id]);
        return redirect()->route('mypage', ['id' => Auth::user()->id]);

    }

    //退会（論理削除）
    public function delete_form(int $id)
    {
        $user = User::find($id)->delete();
        Auth::logout();
        return redirect('login');

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

    //購入履歴一覧画面
    public function buyhistory_form(int $id)
    {
        //$purchase = Purchase::with('sale:id,picture,price')->get();
        $purchase = Purchase::with('sale')->get();
        //$purchase = Auth::user()->purchase()->get();
        //$purchase = Sale::with('purchase:sales_id')->get();
        // $purchase = Purchase::with('sale')->where('id', $id)->first();
        // $sale = $purchase->sale()->get();

        $purchase = Auth::user()->purchase()->get();

        
        //dd($purchase);

        return view('buyhistory', [
            'purchase' => $purchase,
        ]);
    }

    //フォロー一覧画面
    public function followuser(int $id)
    {   
        $follow = Auth::user()->follow()->get();

        return view('follow', [
            'follow' => $follow,
        ]);
        
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

    //フォローを外す（物理削除）
    public function del_follow(int $id)
    {
        $follow = Follow::find($id);
        $follow->delete();
        return redirect()->route('mypage', ['id' => Auth::user()->id]);
    }

    //フォロー用ユーザー画面
    public function user_form(int $id)
    {
        $user = User::with('sale')->where('id', $id)->first();
        $sale = $user->sale()->get();
        //$follow_id = Follow::find($id);

        $myfollows = Auth::user()->follow()->get();
        $test = '';
        $myfollowid = '';
        foreach ($myfollows as $myfollow)
        {
            if($myfollow->follow_id == $id)
            {
                $test = 'テスト';
                $myfollowid = $myfollow->id;

            }
        }
        if($test != 'テスト')
        {
            $test = '';
            $myfollowid = '';

        }

        //dd($test);

        // if(Auth::user()->follow()->follow_id === $user->id)
        // $test = Auth::user()->

        //dd($user,$sale);
        //var_dump($sale);

        return view('user', [
            'user' => $user,
            'sale' => $sale,
            'test' => $test,
            'myfollowid' => $myfollowid,
        ]);
    }

    //売上一覧画面
    public function sell_form(int $id)
    {
        // $sell = Purchase::join('sales', 'purchases.sales_id', '=', 'sales.id')
        //          ->where('sales.user_id', '=', $id)
        //          ->get();
        
        // $other = Purchase::join('sales', 'purchases.sales_id', '=', 'sales.id')
        //           ->join('users', 'sales.user_id', '=', 'users.id')
        //           ->where('users.id', '=', $id)
        //           ->get();
        
        // $data = array(
        //     'sell' => $sell,
        //     'other' => $other,
        // );

        // $datas = Auth::user()->with('sale')
        //                      ->with('purchase')

        $user = Auth::user();
        $datas = User::with(['sale' => function ($query) {
            $query->with(['purchase']);
        }])->find($user->id);



        //$datas = Auth::user();

        //dd($datas);
        //$key = array_keys($sell);
        //dd(array_column($sell, 0, 'good'));
        //dd($sell);
        //dd($data['sell']['0']['good']);
        return view('sell', [
            // 'sell' => $sell,
            // 'other' => $other,
            'datas' => $datas,
        ]);
    }

    //マイページ用出品商品詳細
    public function saleDetail(int $id) 
    {
         $sale = Sale::with('user')->where('id', $id)->first();
 
         return view('mysaledetail', [
             'sale' => $sale,
         ]);
    }

    //マイページ用出品商品詳細編集
    public function detailedit_form(int $id)
    {
        $sale = Sale::with('user')->where('id', $id)->first();
        $result = $sale->find($id);

        // $result->validate([
        //     'name' => 'required',
        //     'price' => 'required|integer',
        //     'comment' => 'required',
        //     'picture' => 'required',
        //     'quality' => 'required',
        // ]);

        //dd($result);
		
        return view('detail_edit', [
            'sale' => $sale,
            'id' => $id,
            'result' => $result,
        ]);
    }


    //確認画面
    public function edit_check(int $id, Request $request)
    {
        $sale = Sale::with('user')->where('id', $id)->first();
        $result = $sale->find($id);

        //dd($request->picture);
        //dd($result);

        //dd($result);
        if(isset($request->picture)) {
            //dd($request->picture);
            //name属性が'picture'のinputタグをファイル形式にして、画像を本来の名前にする
            $picture = $request->file('picture')->getClientOriginalName();

            //同じファイル名の画像でも良いように日時をが王ファイルの名前につける
            $pic_name = date('Ymd_His').'_'.$picture;
            
            //storage/imagesに画像を保存する
            $request->file('picture')->move('public/image/', $pic_name);
            
            //上記処理にて保存した画像に名前を付け、salesテーブルのpictureカラムに、格納
            $request->picture = $pic_name;
            

            //dd($request->picture);
            //セッションに書き込む
            $contact = $request->only('name','price','quality','comment');
            //dd($contact);
            $contact_pic = $pic_name;

            $data = array(
                'contact' => $contact,
                'contact_pic' => $contact_pic,
            );
            
            session()->put('data', $data);
            // $request->session()->put('contact', $contact);

        } else {
            $contact = $request->only('name','price','quality','comment');
            $pic_name = '';
            $contact_pic = $pic_name;
            //dd($contact,$contact_pic);

            $data = array(
                'contact' => $contact,
                'contact_pic' => $contact_pic,
            );
            //dd($data);
            //var_dump($data);
            
            //$request->session()->put('data', $data);
            session()->put('data', $data);
            
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'comment' => 'required',
            'quality' => 'required|in:未使用,目立った傷や汚れなし,傷や汚れあり',
        ], [
            'quality.required' => '商品の状態を選択してください。',
            'quality.in' => '選択された商品の状態が無効です。',
        ]);

        // $contact = $request->all();
        //dd($data);

        
        
        return view('edit_check', [
            'sale' => $sale,
            'id' => $id,
            'data' => $data
        ]); 
    }

    //マイページ用出品商品詳細編集処理
    public function complete(int $id, Request $request)
    {
        $sale = Sale::with('user')->where('id', $id)->first();
        //$sale = new Sale;
        $record = $sale->find($id);

        $val = session()->get('data');

        $record->name = $val['contact']['name'];
        $record->price = $val['contact']['price'];
        $record->quality = $val['contact']['quality'];
        $record->comment = $val['contact']['comment'];
        if($val['contact_pic'] != '') {
            $record->picture = $val['contact_pic'];
        }
        


        //echo $record;
        $record->save();
        //return view('mypage', ['id' => Auth::user()->id]);
        //return redirect('/');
        return redirect()->route('mypage', ['id' => Auth::user()->id]);
    }

    //出品商品の削除（物理削除）
    public function sale_delete(int $id)
    {
        $sale = Sale::find($id)->delete();;
        return redirect()->route('mypage', ['id' => Auth::user()->id]);
    }
}