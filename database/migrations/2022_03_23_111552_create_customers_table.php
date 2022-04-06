<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code_customer',8);
            $table->string('name_customer',191);
            $table->string('country_customer',24);
            $table->string('city_customer',191);
            $table->string('address_customer',191);
            $table->string('mobile_customer',17);
            $table->string('phone_customer',17)->nullable();
            $table->string('email_customer',191)->nullable();
            $table->text('photo_customer')->nullable();            
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
        Schema::dropIfExists('customers');
    }
}
