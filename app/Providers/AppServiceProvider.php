<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        \Illuminate\Support\Carbon::setLocale('id');
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
        $url->formatScheme('https');
        // URL::forceScheme('https');

        // WhatsApp settings from database (override env when set)
        if (Schema::hasTable('settings') && Schema::hasColumn('settings', 'whatsapp_token')) {
            $token = GetSetting('whatsapp_token');
            if ($token !== null && $token !== '') {
                Config::set('services.whatsapp.token', $token);
            }
        }
        if (Schema::hasTable('settings') && Schema::hasColumn('settings', 'whatsapp_base_url')) {
            $baseUrl = GetSetting('whatsapp_base_url');
            if ($baseUrl !== null && $baseUrl !== '') {
                Config::set('services.whatsapp.base_url', $baseUrl);
            }
        }
    }
}
