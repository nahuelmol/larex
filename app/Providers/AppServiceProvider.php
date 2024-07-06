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
                'type' => 'service_account',
                "project_id" => "larex-7e3e6",
                "private_key_id" => "dbef4fc3b06835ec0daefc8dd58d434227b8b793",
                "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDIrRPku0Gsx4Cr\nylbgyvp1+1MvN/r1NG9jSCKalnsdX/IWM98ljuT/uUonFbf868pVL9TQNxw7CaoL\nwT5l4J8weqeKfUQ39as48fDpglqgmC1pDUOYMHNivz38ptug+I5TbHeMJHRO6tMk\nIpxhgg8oXW5v53NOfhHxN8fH5KbT5mlMuoGE81cdb0R//d0w4/tzrPDFuvQSbxJ1\nC5FORZZ5zEeRgc9oV+ik8nPLcuutArtec3Jvd19JPs9oQyC0uuSAnTHpgznwvW8y\nfR1jg7wHmXUy6hHTTbGu0ZVLjPmDksfFvOG16xAPvUnX6WoWAgNQf03osHBnjScK\nurtkvQqXAgMBAAECggEAGTk0BmyJETwUTsOEjwXEXH8GEinRp+96zrpa6x5eBC+y\noJrNgg2HeCMkkGwY77f9ex6je7ZpnHwW/RpBixGkQLYyB+S95eDBsEss0lT5qjTm\nhE1QATmZz0AlfPPGKGIFlbPNBPbyDZdTibe1+0WbPSIdRwCLDEMpYy31NQlm9LxI\nkzJnTm+aGFPbWf2arXAibiTmIhL0iyjH72LorOvo/Po/HAtUxXjhwUkkPkQWygt0\nPHXmtNIS7JK176BtKTsacRrpmCHgNaUOdDxL5/sYHPeQoRs7PrCVrXijOSQqIcpB\nVzDtCK5S4IumDus/vudSemJrX8nvJs0C93KQ4WPdPQKBgQD8M2cvUWTe3AksDMJe\nWafzMMyCGIgyTfsx72iMSIHlMdjN7njp7hbAz1z5FGFnv4uDnuZQOQI+ZHTHueeX\nb7W/WGsfikVK2jSeJIf5aGzDMc3TiX6XeTEGhGx56DVfjSCVS04URzgcBCZDVemx\noqZUDy3ZyJa1jbmm52uTlzC9SwKBgQDLsvkGkGM1hNqRaHcoqW6pU6H5RFsfbluy\nJjvrH/HId+FyksCF28lAgSpW0tdeKhcSNZwrf3sOgcHDXMyaM6+tTPL6fNgVLDfb\nYPEkiBZ8xbUU9B5hKo2nkw3GAoIvOpI74X4h1dVyiMjO5Iknt+2kqrhnrCQkhbHR\n42XFBlmUZQKBgGJcSeoSfJzOhGVBtKzHmtEmPxyeJMA52bZoAQZ1YPPatQvb7hyO\nVyFrvn8Gi9bCxc7XskuncFCVLVaYEtLlJqUx/tWWP+ApqkvjQ4TqTUDzs6rE/TJm\nedBo5UXGYsqZaBPSAum1vRRwKdwpLbOyE9zE7sT5jo3QcI+/wh0V4lRxAoGAJUau\nLZZUoWGbgcqFK8q9tnzYgj4REtJmM1at1lw1KcNOXWIfmx9aV9SLQ/I3eULoj+uB\nlbAxe7khFTgxNPLKbkNLn60i+dTqr9mwp0fEHbcsaRY3TP61h3nwplClNDFau1yL\ncXOpKNmBLeNCeiM9eMnJDyfAQXK51LfxUrnTwMUCgYEA71E9dWCKjbol0paeaNz9\nUTOjRKb56gXnN4Nd8KaBbM2aRaf3uMCytkcLU4d1KpLHzhMELg3LT3yYO6iuFsam\nuy9QAGE1Xa6hcs7OivWTwkpf38LglW6ZiXvvP4jXU+tIAyPQxdqUvcDBNUYjJb/k\nAEDAMPwkC0LK7R/vSBLa4PI=\n-----END PRIVATE KEY-----\n",
                "client_email" => "firebase-adminsdk-5uhc9@larex-7e3e6.iam.gserviceaccount.com",
                "client_id" => "104413848055024143398",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-5uhc9%40larex-7e3e6.iam.gserviceaccount.com",
                "universe_domain" => "googleapis.com",
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
