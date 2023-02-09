<?php

namespace App\Providers;

use App\Rules\Translatable;
use App\Support\FirebaseMessagingClient;
use App\Support\MessagingClientInterface;
use App\Support\OrangeSmsSender;
use App\Support\SmsSender;

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
        $this->app->singleton(SmsSender::class, OrangeSmsSender::class);
        $this->app->singleton(MessagingClientInterface::class, FirebaseMessagingClient::class);

        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('translatable', function ($attribute, $value, $parameters, $validator) {
            $langKeys = [ 'en', 'fr', 'tnfr', 'tnar', 'ar' ];
            foreach ($langKeys as $lang) {
                if (! isset($value[$lang])) {
                    return false;
                }
            }
            return true;
        });
        //
    }
}
