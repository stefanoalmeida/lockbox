<?php

return [
    'database' => [
        'driver' => 'sqlite',
        'database' => base_path('database/database.sqlite'),
    ],

    'security' => [
        'first_key' => env('ENCRYPT_FIRST_KEY'),
        'second_key' => env('ENCRYPT_SECOND_KEY'),
    ],
];
