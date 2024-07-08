<?php

declare(strict_types=1);

return [

    'default' => env('FIREBASE_PROJECT', 'app'),
    'projects' => [
        'app' => [
            'credentials' => [
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
                //'file' => env('FIREBASE_CREDENTIALS'),
            ],
            //,env('GOOGLE_APPLICATION_CREDENTIALS')),

            'auth' => [
                'tenant_id' => env('FIREBASE_AUTH_TENANT_ID'),
            ],

            'firestore' => [
                // 'database' => env('FIREBASE_FIRESTORE_DATABASE'),
            ],

            'database' => [
                'url' => env('FIREBASE_DATABASE_URL'),
            ],

            'dynamic_links' => [

                'default_domain' => env('FIREBASE_DYNAMIC_LINKS_DEFAULT_DOMAIN'),
            ],

            'storage' => [

                'default_bucket' => env('FIREBASE_STORAGE_DEFAULT_BUCKET'),

            ],

            'cache_store' => env('FIREBASE_CACHE_STORE', 'file'),

            'logging' => [
                'http_log_channel' => env('FIREBASE_HTTP_LOG_CHANNEL'),
                'http_debug_log_channel' => env('FIREBASE_HTTP_DEBUG_LOG_CHANNEL'),
            ],

            'http_client_options' => [

                'proxy' => env('FIREBASE_HTTP_CLIENT_PROXY'),

                'timeout' => env('FIREBASE_HTTP_CLIENT_TIMEOUT'),

                'guzzle_middlewares' => [],
            ],
        ],
    ],
];
