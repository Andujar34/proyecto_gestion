<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('products',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_product_user');
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->unsignedInteger('provider_id')->nullable();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->string('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('products');
    }
}
