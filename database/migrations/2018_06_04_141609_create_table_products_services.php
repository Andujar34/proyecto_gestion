<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductsServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_services',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_product_service_user');
            $table->string('amount');
            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
            $table->unsignedInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::drop('products_services');
    }
}
