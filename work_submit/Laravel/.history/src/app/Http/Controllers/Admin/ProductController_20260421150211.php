<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Product as StripeProduct;
use Stripe\Price;

class ProductController extends Controller
{
  // 商品一覧
  public function index()
  {
    $products = Product::all();
    return view('admin.products.index', compact('products'));
  }

  // 商品登録画面
  public function create()
  {
    return view('admin.products.create');
  }

  // 商品登録処理
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string|max:255',
      'category' => 'required|string|max:255',
      'price' => 'required|numeric',
      'stock_quantity' => 'required|integer',
      'size' => 'required|string|max:50',
      'color' => 'required|string|max:50',
      'image' => 'required|file|image|max:2048',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->category = $request->category;
    $product->price = $request->price;
    $product->stock_quantity = $request->stock_quantity;
    $product->size = $request->size;
    $product->color = $request->color;
    $product->is_trend = $request->has('is_trend') ? 1 : 0;

    if ($request->hasFile('image')) {
      $path = $request->file('image')->store('products', 'public');
      $product->image = $path;
    }

    $product->save();

    // Stripeのキー設定
    Stripe::setApiKey(config('services.stripe.secret'));

    // Stripeに商品作成
    $stripeProduct = StripeProduct::create([
      'name' => $product->name,
    ]);

    // Stripeに価格作成
    $stripePrice = Price::create([
      'unit_amount' => (int) $product->price,
      'currency' => 'jpy',
      'product' => $stripeProduct->id,
    ]);

    // DBにStripeのID保存
    $product->stripe_product_id = $stripeProduct->id;
    $product->stripe_price_id = $stripePrice->id;

    $product->save();

    return redirect()->route('admin.products.index')->with('success', '商品を追加しました');
  }

  // 編集画面
  public function edit($id)
  {
    $product = Product::findOrFail($id); // IDで商品取得
    return view('admin.products.edit', compact('product'));
  }

  // 更新処理
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string|max:255',
      'category' => 'required|string|max:255',
      'price' => 'required|numeric',
      'stock_quantity' => 'required|integer',
      'size' => 'nullable|string|max:50',
      'color' => 'nullable|string|max:50',
      'image' => 'nullable|string|max:255',
    ]);

    $product = Product::findOrFail($id);
    $product->update($request->all());

    Stripe::setApiKey(config('services.stripe.secret'));
    StripeProduct::update(
      $product->stripe_product_id,
      ['name' => $request->name]
    );
    $stripePrice = Price::create([
      'unit_amount' => $request->price,
      'currency' => 'jpy',
      'product' => $product->stripe_product_id,
    ]);
    $product->stripe_price_id = $stripePrice->id;
    $product->save();

    return redirect()->route('admin.products.index')->with('success', '商品を更新しました');
  }

  // 商品削除
  public function destroy($id)
  {
    $product = Product::findOrFail($id);

    // Stripeキー設定
    Stripe::setApiKey(config('services.stripe.secret'));

    // Stripe側を無効化
    \Stripe\Product::update(
      $product->stripe_product_id,
      ['active' => false]
    );

    // DB削除
    $product->delete();

    return redirect()->route('admin.products.index')
      ->with('success', '商品を削除しました');
  }
}
