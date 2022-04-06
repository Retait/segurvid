<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->char('code_order',11);
            $table->date('date_order');
            $table->boolean('type_payment');
            $table->double('cost_order');
            $table->text('description_order')->nullable();
            $table->date('date_accident');
            $table->time('time_accident')->nullable();
            $table->text('location_accident');
            $table->string('code_partner',8)->nullable();
            $table->string('name_partner',191)->nullable();
            $table->string('phone_partner',17)->nullable();
            $table->text('file_order');
            $table->string('user_id',24);
            $table->tinyInteger('typeaccident_id');
            $table->string('kin_id',24)->nullable();
            $table->char('status_order',1);
            $table->unsignedBigInteger('company_id')->unsigned();
            $table->unsignedBigInteger('insurance_id')->unsigned();
            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->unsignedBigInteger('service_id')->unsigned();
            
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('insurance_id')->references('id')->on('insurances');
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('orders');
    }
}
