<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 登録フォーム表示
    public function showRegisterForm()
    {
        return view('user.register');
    }

    // 登録処理
    public function register(Request $request)
    {
        // 入力バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // ユーザー作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password_hash' => Hash::make($request->password),
        ]);

        // 登録後自動ログイン
        Auth::login($user);

        return redirect('/profile'); // プロフィールページへ
    }
    //登録確認
    public function confirm(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // 入力されたデータをそのまま確認画面へ渡す
        $data = $request->all();

        return view('user.confirm', compact('data'));
    }
    //登録完了
    public function submit(Request $request)
    {
        // DBに保存
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password_hash' => Hash::make($request->password),
        ]);

        return view('user.submit'); // 完了ページへ
    }

    // ログインフォーム表示
    public function showLoginForm()
    {
        return view('user.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/profile');
        }

        return back()->withErrors(['email' => 'ログイン情報が正しくありません']);
    }

    // プロフィールページ表示
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // プロフィール更新
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password_hash = Hash::make($request->password);
        }
        $user->save();

        return redirect('/profile')->with('message', 'プロフィールを更新しました');
    }

    // ログアウト
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
