<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $config =
            [
                'secret' => ReCaptcha('recaptcha_secret_key'),
                'sitekey' => ReCaptcha('recaptcha_site_key'),
                'options' => [
                    'timeout' => 30,
                ]
            ];


        Config::set('captcha', $config);

        Paginator::useBootstrap();
    }
}
