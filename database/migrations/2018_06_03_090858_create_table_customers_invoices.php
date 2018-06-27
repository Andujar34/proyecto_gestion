<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomersInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_services',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_customer_service_user');
            $table->string('amount');
            $table->string('date');

            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
           
            $table->unsignedInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services');

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
        Schema::drop('customers_services');
    }
}
