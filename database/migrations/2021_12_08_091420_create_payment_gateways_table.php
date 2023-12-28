<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();

            $table->string('ssl_commerz_store_id')->nullable();
            $table->string('ssl_commerz_store_password')->nullable();
            $table->boolean('ssl_commerz_is_sandbox')->nullable();
            $table->boolean('ssl_commerz_status')->nullable();
            $table->string('ssl_commerz_country')->nullable();
            $table->string('ssl_commerz_currency')->nullable();
            $table->string('ssl_commerz_rate')->nullable();


            $table->string('paypal_api_mode')->nullable();
            $table->string('paypal_api_client')->nullable();
            $table->string('paypal_api_secret')->nullable();
            $table->boolean('paypal_api_status')->nullable();
            $table->string('paypal_country')->nullable();
            $table->string('paypal_currency')->nullable();
            $table->string('paypal_rate')->nullable();



            $table->string('stripe_api_publishable_key')->nullable();
            $table->string('stripe_api_secret_key')->nullable();
            $table->boolean('stripe_api_status')->nullable();
            $table->string('stripe_country')->nullable();
            $table->string('stripe_currency')->nullable();
            $table->string('stripe_rate')->nullable();


            $table->string('razorpay_key_id')->nullable();
            $table->string('razorpay_key_secret')->nullable();
            $table->boolean('razorpay_status')->nullable();
            $table->string('razorpay_country')->nullable();
            $table->string('razorpay_currency')->nullable();
            $table->string('razorpay_rate')->nullable();



            $table->string('flutterwave_public_key')->nullable();
            $table->string('flutterwave_secret_key')->nullable();
            $table->string('flutterwave_encryption_key')->nullable();
            $table->boolean('flutterwave_status')->nullable();
            $table->string('flutterwave_country')->nullable();
            $table->string('flutterwave_currency')->nullable();
            $table->string('flutterwave_rate')->nullable();



            $table->string('instamojo_api_key')->nullable();
            $table->string('instamojo_auth_token')->nullable();
            $table->string('instamojo_salt')->nullable();
            $table->boolean('instamojo_status')->nullable();
            $table->string('instamojo_country')->nullable();
            $table->string('instamojo_currency')->nullable();
            $table->string('instamojo_rate')->nullable();



            $table->string('mollie_email')->nullable();
            $table->string('mollie_api_key')->nullable();
            $table->boolean('mollie_status')->nullable();
            $table->string('mollie_country')->nullable();
            $table->string('mollie_currency')->nullable();
            $table->string('mollie_rate')->nullable();



            $table->string('paystack_public_key')->nullable();
            $table->string('paystack_secret_key')->nullable();
            $table->boolean('paystack_status')->nullable();
            $table->string('paystack_country')->nullable();
            $table->string('paystack_currency')->nullable();
            $table->string('paystack_rate')->nullable();



            $table->string('bank_account_details')->nullable();
            $table->boolean('bank_account_status')->nullable();

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
        Schema::dropIfExists('payment_gateways');
    }
}
