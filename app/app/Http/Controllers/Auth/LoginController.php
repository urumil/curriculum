<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Sale;
use App\User;
use App\Purchase;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // ログインに成功した場合の処理
            if (Auth::user()->deleted_at !== null) {
                // ユーザーが利用停止されている場合の処理
                Auth::logout(); // ログアウト
                return redirect()->back()->with('warning', 'あなたのアカウントは利用停止されています。サポートに連絡してください。');
            }
            return redirect()->intended('/home'); // ログイン後のリダイレクト先
        }
        // ログインに失敗した場合の処理
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'あなたのアカウントは利用停止されている可能性があります。齊藤明日香に連絡してください。',
        ]);
    }
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['index']);
        $this->middleware('guest')->except('logout');
    }
}
