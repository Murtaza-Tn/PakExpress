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

    'google' => [

        'client_id' => '1047480583391-ne7r8u1ji7tsenkb5e7ud4t4itegepjf.apps.googleusercontent.com',

        'client_secret' => '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',

        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'facebook' => [

        'client_id' => '1288647528416907',

        'client_secret' => 'ceed0eced0c3728dbbad912d362df172',

        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
