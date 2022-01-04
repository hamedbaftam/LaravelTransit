<?php

return [
    'default' => env('LARAVEL_TRANSIT_DRIVER', 'rabbitMq'),

    'drivers' => [

        'rabbitMq' => [
            'host' => env('LARAVEL_TRANSIT_HOST', 'localhost'),
            'port' => env('LARAVEL_TRANSIT_PORT', '5672'),
            'user' => env('LARAVEL_TRANSIT_USER', 'guest'),
            'password' => env('LARAVEL_TRANSIT_PASSWORD', 'guest'),
        ]

    ]
];
