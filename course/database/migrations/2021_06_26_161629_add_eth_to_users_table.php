<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEthToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_type_id');//FK
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->string('eth_acc_address');
            $table->string('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_type_id');//FK
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->string('eth_acc_address');
            $table->string('location'); 
        });
    }
}
