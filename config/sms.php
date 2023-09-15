<?php


return [

    /*
    |--------------------------------------------------------------------------
    | SMS sender Settings
    |--------------------------------------------------------------------------
    | SMS api configuration parameters
    */
    'api' => [
        'key' => env('SMS_API_KEY'),
        'sender' => env('SMS_API_SENDER'),
        'url' => env('SMS_API_URL')
    ]
];
