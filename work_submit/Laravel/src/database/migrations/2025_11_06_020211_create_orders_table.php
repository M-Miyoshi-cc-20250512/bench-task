<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('user_id'); //　ユーザーID
            $table->unsignedBigInteger('total_price'); //　Totalの価格
            $table->integer('status')->default(0); // 0=未発送,1=発送済み,2=キャンセル
            $table->timestamps(); // created_at, updated_at
            
            //外部キー
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}