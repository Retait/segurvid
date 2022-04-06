<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->char('code_invoice',11);
            $table->date('date_invoice');
            $table->double('subtotal_invoice',9,2);
            $table->double('discount_invoice',9,2);
            $table->double('tax_invoice',9,2);
            $table->double('total_invoice',9,2);
            $table->double('deposit_invoice',9,2);
            $table->string('user_id',24);
            $table->unsignedBigInteger('order_id')->unsigned();
            $table->unsignedBigInteger('payment_id')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('payment_id')->references('id')->on('payments');
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
        Schema::dropIfExists('invoices');
    }
}
