<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

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

// 商品管理画面
Route::prefix('admin')->name('admin.')->group(function () {
     // 管理画面トップ
     Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

     // 商品リソース（管理画面用）
     Route::resource('products', AdminProductController::class);
     // ユーザー管理
     Route::get('users', [App\Http\Controllers\Admin\AdminUserController::class, 'index'])->name('users.index');
});

// ユーザー登録
Route::get('/register', [UserController::class, 'showRegisterForm']); // 登録フォーム表示
Route::post('/register', [UserController::class, 'register']);        // 登録処理
Route::post('/register/confirm', [UserController::class, 'confirm'])->name('register.confirm'); //登録確認
Route::post('/register/complete', [UserController::class, 'complete'])->name('register.complete'); //登録完了

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

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
// カテゴリ別（トレンド商品）
Route::get('/category/{category}/trending', [HomeController::class, 'categoryTrending'])->name('category.trending');
//カテゴリ
Route::get('/products/{category}', [ProductController::class, 'index'])->name('products.index');
//商品詳細ページ
Route::get('/products/{category}/{id}', [ProductController::class, 'showProduct'])->name('products.show');
