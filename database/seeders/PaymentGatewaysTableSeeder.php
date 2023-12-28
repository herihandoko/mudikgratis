<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentGatewaysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_gateways')->delete();
        
        \DB::table('payment_gateways')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ssl_commerz_store_id' => NULL,
                'ssl_commerz_store_password' => NULL,
                'ssl_commerz_is_sandbox' => 0,
                'ssl_commerz_status' => 0,
                'ssl_commerz_country' => NULL,
                'ssl_commerz_currency' => NULL,
                'ssl_commerz_rate' => NULL,
                'paypal_api_mode' => 'sandbox',
                'paypal_api_client' => 'AezEgWqWK2x4sNGGQIKQGRUO4GarBVRe5cGtq1DjpzUT3hWj95OKoj_9mNLpN3HhDIfiM3HzHTqX7Nx3',
                'paypal_api_secret' => 'EE8fAI1QANXqaiNYG8ybg4cEmmb6WSWN17Q9ROHQ5q437L9khhf44LQhzmfm2QegUbhOkTS-lMFBNGp5',
                'paypal_api_status' => 1,
                'paypal_country' => 'US',
                'paypal_currency' => 'USD',
                'paypal_rate' => '1',
                'stripe_api_publishable_key' => 'pk_test_TYooMQauvdEDq54NiTphI7jx',
                'stripe_api_secret_key' => 'sk_test_4eC39HqLyjWDarjtT1zdp7dc',
                'stripe_api_status' => 1,
                'stripe_country' => 'US',
                'stripe_currency' => 'USD',
                'stripe_rate' => '1',
                'razorpay_key_id' => 'rzp_test_k23Mr4BskGqpBu',
                'razorpay_key_secret' => 'LTrXh7U5xWeZoAHcqdhemFkg',
                'razorpay_status' => 1,
                'razorpay_country' => '--- Select ----',
                'razorpay_currency' => '--- Select ----',
                'razorpay_rate' => NULL,
                'flutterwave_public_key' => 'FLWPUBK_TEST-30e42cf6c5ef2062ceda4be024b2dab0-X',
                'flutterwave_secret_key' => 'FLWSECK_TEST-8007291fe9fdc301e571dd668bfffe40-X',
                'flutterwave_encryption_key' => 'FLWSECK_TESTa20d7ad381cb',
                'flutterwave_status' => 1,
                'flutterwave_country' => 'NG',
                'flutterwave_currency' => 'NGN',
                'flutterwave_rate' => '10',
                'instamojo_api_key' => 'test_83d94d041cbbcde498a6547ab87',
                'instamojo_auth_token' => 'test_b2ee7723eea39a33a1b78b1a1e5',
                'instamojo_salt' => 'e5218131190a47239594c1e3d36c3318',
                'instamojo_status' => 1,
                'instamojo_country' => '--- Select ----',
                'instamojo_currency' => '--- Select ----',
                'instamojo_rate' => NULL,
                'mollie_email' => 'iammashikur@gmail.com',
                'mollie_api_key' => 'test_HFc5UhscNSGD5jujawhtNFs3wM3B4n',
                'mollie_status' => 1,
                'mollie_country' => 'RU',
                'mollie_currency' => 'EUR',
                'mollie_rate' => '1',
                'paystack_public_key' => 'pk_test_c18a09b946247f27e94a181e8dcc02f8fbd01deb',
                'paystack_secret_key' => 'sk_test_02d4b4a8979772f9ffcb2cf016c2d692c7d99de1',
                'paystack_status' => 1,
                'paystack_country' => 'BD',
                'paystack_currency' => 'GHS',
                'paystack_rate' => '20',
                'bank_account_details' => 'Bank Account Information',
                'bank_account_status' => 1,
                'created_at' => '2022-01-29 06:11:01',
                'updated_at' => '2022-05-10 17:50:53',
            ),
        ));
        
        
    }
}