<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsignedBigInteger();//PK
            $table->unsignedBigInteger('user_id');//FK
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->float('weight');
            $table->text('detail');
            $table->string('eth_tx_address');  // hash 
            $table->unsignedInteger('eth_product_id'); // for get transcation
            $table->timestamp('create_at');
            $table->boolean('ractopamine');//瘦肉精 YES OR NO
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
