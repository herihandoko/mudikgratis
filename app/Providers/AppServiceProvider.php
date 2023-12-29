<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\UrlGenerator;

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
        // $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
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
        // $url->formatScheme('https');
        // URL::forceScheme('https');
    }
}
