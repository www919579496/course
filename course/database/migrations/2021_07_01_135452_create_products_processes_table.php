<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();//FK
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('process_id')->nullable();//FK
            $table->foreign('process_id')->references('id')->on('processes');
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
        Schema::dropIfExists('products_processes');
    }
}
