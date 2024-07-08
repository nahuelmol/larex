<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Messaging;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Auth::class, function($app){
            return $this->createService('auth');
        });
        $this->app->singleton(Messaging::class, function($app){
            return $this->createService('messaging');
        });
        $this->app->singleton(Database::class, function($app){
            return $this->createService('database');
        });
    }
    protected function createService(string $service){
        $credentials = [
            "type" => env('FIREBASE_TYPE'),
            "project_id" => env('FIREBASE_PROJECT_ID'),
            "private_key_id" => env('FIREBASE_PRIVATE_KEY_ID'),
            "private_key" => str_replace('\\n', "\n", env('FIREBASE_PRIVATE_KEY')),
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
        switch($service){
            case 'messaging':
                return $factory->createMessaging();
            case 'database':
                return $factory->createDatabase();
            case 'auth':
                return $factory->createAuth();
            default:
                throw new InvalidArgumentException("unknown firebase service");
        }
    }

    public function boot(UrlGenerator $url): void
    {
        if (env('APP_ENV') == 'production'){
            $url -> forceScheme('https');
        }
    }
}
