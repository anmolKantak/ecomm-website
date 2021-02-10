<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id' => '111344354167985',
        'client_secret' => '10d33ba093d6c8e3a88c3f2a11eb50da',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '504697839377-vircferjvj5f4v0nr6sfc6bioevk4l5c.apps.googleusercontent.com',
        'client_secret' => 'PGT5fi3mpBCQx-oLgxZcd6vP',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
    
    'twitter' => [
        'client_id' => '5fmZz6ycvTYFv7Wf3bIXlJkMuN',//'qvST9xg3pdRQ2XTC80jNmTKQ2'
        'client_secret' => 'yLrjM368l6xwkqX5KCd9oR4le5k06XUnmKzam7fqkJ4JLJOykL',//'3gvdmP0G5eOyATpFaBDiXET6miVGgK6XxN04HkZ32uLBgWibFq'
        'redirect' => 'http://localhost:8000/login/twitter/callback',
        //'bearer token' => 'AAAAAAAAAAAAAAAAAAAAAH7CMAEAAAAA3A8zwwQvDt%2BIDKu%2BKKxcfOkgdg8%3DQ9mVdnePqTKjqPMcGHYeap7IFP1g44egjoPNAfHAOKQOkk21Sz',
        //'AAAAAAAAAAAAAAAAAAAAAAXGMAEAAAAAI%2BLbtlGs6PlmzQXJwfvsvelkRd4%3DajoQn0T1g1DyeithODxJfQnwpJf6nVE1mTtWnKSW0G3u9bAV7z'
    ],

];
