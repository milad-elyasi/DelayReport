<?php

return [
    /**
     * integrations for new ETA service.
     */
    'ETA' => [
        'base_url' => env('ETA', 'http://run.mocky.io/v3/122c2796-5df4-461c-ab75-87c1192b17f7'),
    ],

    'rabbitmq' => [
        'host' => env('RABBITMQ_HOST'),
        'port' => env('RABBITMQ_PORT'),
        'username' => env('RABBITMQ_USERNAME'),
        'password' => env('RABBITMQ_PASSWORD'),
    ],
];
