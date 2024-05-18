<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetEmail;

class ResetController extends Controller
{
    //　パスワード再設定用のメール送信フォーム
    public function requestReset()
    {
        return view('users.reset_input_mail');
    }

    //  メール送信 
    public function sendResetMail(Request $request)
    {
        return redirect()->route('reset.send.complete');
    }

    // メール送信完了
    public function completeReset()
    {
        return view('users.reset_input_mail_complete');
    }

    // パスワード再設定
    public function resetPassword(Request $request)
    {
        return view('users.reset_input_password');
    }

    // パスワード更新
    public function updatePassword(Request $request)
    {
        return view('users.reset_input_password_complete');
    }

    // public function hoge()
    // {
    //     //メール送信に使うインスタンスを生成
    //     $passwordResetEmail = new PasswordResetEmail;
    //     //メール送信
    //     Mail::send($passwordResetEmail);

    //     //送信成功か確認
    //     if(count(Mail::failures()) > 0)
    //     {
    //         $message = 'メール送信に失敗しました';
    //         //元の画面に戻る
    //         return back()->withErrors($message);

    //     } else {
    //         $messages = 'メールを送信しました';
    //         //別のページに遷移する
    //         return redirect()->route('login')->with(compact('messages'));
    //     }
    // }

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
    public function create()
    {
        //
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
