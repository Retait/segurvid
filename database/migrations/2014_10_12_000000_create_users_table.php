<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('code_user',8);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('job_user',191);
            $table->string('country_birth',3)->nullable();
            $table->string('country_residence',3)->nullable();
            $table->string('city_user',191)->nullable();
            $table->string('zipcode_user',5)->nullable();
            $table->string('address_user',191)->nullable();
            $table->string('phone_user',17)->nullable();
            $table->string('code_company',11)->nullable();
            $table->string('user_company',191);
            $table->string('industry_company',3);
            $table->string('country_company',3);
            $table->string('city_company',191)->nullable();
            $table->string('currency_company',3);
            $table->tinyInteger('tax_company');
            $table->string('zipcode_company',5)->nullable();
            $table->string('address_company',191)->nullable();
            $table->string('phone_company',17)->nullable();
            $table->boolean('status_user');
            $table->boolean('type_user');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
