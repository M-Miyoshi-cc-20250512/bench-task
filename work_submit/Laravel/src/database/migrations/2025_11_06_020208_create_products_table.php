<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID
            $table->string('name', 255); //指名
            $table->string('description', 255); //説明
            $table->string('category', 255); //カテゴリー
            $table->unsignedBigInteger('price'); //価格
            $table->unsignedBigInteger('stock_quantity'); //在庫数
            $table->timestamps(); //作成・更新日時
        });
    }
    public function down()
    {
        Schema::dropIfExists('products'); 
    }
}