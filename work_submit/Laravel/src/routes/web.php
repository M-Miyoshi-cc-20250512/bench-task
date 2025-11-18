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
Route::post('/register/complete', [UserController::class, 'complete'])->name('register.complete');//登録完了

// ユーザーログイン
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');    // ログインフォーム表示
Route::post('/login', [UserController::class, 'login'])->name('login.submit');    // ログイン処理

// プロフィール表示
Route::get('/profile', [UserController::class, 'profile'])
     ->name('profile')
     ->middleware('auth');

// プロフィール編集
Route::get('/profile/edit', [UserController::class, 'editProfile'])
     ->name('profile.edit')
     ->middleware('auth');

// プロフィール更新
Route::post('/profile/update', [UserController::class, 'updateProfile'])
     ->name('profile.update')
     ->middleware('auth');

// ログアウト
Route::get('/logout', [UserController::class, 'logout']); 