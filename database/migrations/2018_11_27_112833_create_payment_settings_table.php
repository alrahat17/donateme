<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_option');
            $table->string('withdraw_option');
            $table->text('bank_payment_info');
            $table->string('paypal_id');
            $table->string('paypal_site_mode');
            $table->string('stripe_site_mode');
            $table->string('test_pub_key');
            $table->string('test_sec_key');
            $table->string('com_mode');
            $table->integer('amount');
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
        Schema::dropIfExists('payment_settings');
    }
}
