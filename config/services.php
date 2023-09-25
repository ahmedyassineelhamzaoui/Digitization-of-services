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
        'client_id' => '349593428391-jtli5lqh00pusejrlntjivv9fju9tu4j.apps.googleusercontent.com',
        'client_secret' => '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',
        // 'redirect' => 'https://anl-civ.com/auth/google/callback'
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback'

    ],
    'facebook' => [
        'client_id' => '871763501027609',
        'client_secret' => 'c663bfcf012f1e8c287f682e4e96895e',
        // 'redirect' => 'https://anl-civ.com/auth/facebook/callback'
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback'

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
