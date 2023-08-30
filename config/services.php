<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    'google' => [
        'client_id' => '393516152554-l5ojrqgb6ujutn42gqjq4rhcguj0mfm2.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://anl-civ.com/auth/google/callback'
    ],
    'facebook' => [
        'client_id' => '657858242717609',
        'client_secret' => 'c06ca6d4f70e3347d6641677975bd718',
        'redirect' => 'https://anl-civ.com/auth/facebook/callback'
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    

];
