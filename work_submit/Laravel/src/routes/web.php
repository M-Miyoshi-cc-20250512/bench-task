<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 管理画面
Route::group(['prefix' => '/admin', 'as' => 'admin.'], function(){
  // 管理画面トップ
  Route::get('/', 'admin\AdminController@index')->name('index');
  // 商品登録画面
  Route::get('/product/add', 'admin\ProductController@add')->name('product.add');
});

// ユーザー登録
Route::get('/register', [UserController::class, 'showRegisterForm']); // 登録フォーム表示
Route::post('/register', [UserController::class, 'register']);        // 登録処理
Route::post('/register/confirm', [UserController::class, 'confirm'])->name('register.confirm');//登録確認
Route::post('/register/submit', [UserController::class, 'submit'])->name('register.submit');//登録完了

// ユーザーログイン
Route::get('/login', [UserController::class, 'showLoginForm']);       // ログインフォーム表示
Route::post('/login', [UserController::class, 'login']);              // ログイン処理

// プロフィール
Route::get('/profile', [UserController::class, 'profile']);           // プロフィール表示
Route::post('/profile', [UserController::class, 'updateProfile']);    // プロフィール更新

// ログアウト
Route::get('/logout', [UserController::class, 'logout']); 