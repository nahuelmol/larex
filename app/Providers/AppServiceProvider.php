<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Database::class, function($app) {
            $credentials = [
                "type" => env('FIREBASE_TYPE'),
                "project_id" => env('FIREBASE_PROJECT_ID'),
                "private_key_id" => env('FIREBASE_PRIVATE_KEY_ID'),
                "private_key" => env('FIREBASE_PRIVATE_KEY'),
                "client_email" => env('FIREBASE_CLIENT_EMAIL'),
                "client_id" => env('FIREBASE_CLIENT_ID'),
                "auth_uri" => env('FIREBASE_AUTH_URI'),
                "token_uri" => env('FIREBASE_TOKEN_URI'),
                "auth_provider_x509_cert_url" => env('FIREBASE_AUTH_PROVIDER_CERT'),
                "client_x509_cert_url" => env('FIREBASE_CLIENT_CERT_URL'),
                "universe_domain" => env('FIREBASE_UNIVERSE_DOMAIN'),
            ];
            $factory = (new Factory)
                ->withServiceAccount($credentials)
                ->withDatabaseUri("https://larex-7e3e6-default-rtdb.firebaseio.com");
            return $factory->createDatabase();
        });
    }

    public function boot(UrlGenerator $url): void
    {
        if (env('APP_ENV') == 'production'){
            $url -> forceScheme('https');
        }
    }
}
