<?php

return [
    /*
    |----------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |----------------------------------------------------------------------
    |
    | Configure settings for cross-origin resource sharing (CORS).
    | You can adjust these settings as needed.
    |
    | More info: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:3000',
        'https://raiders-dev.netlify.app',
        'https://raiedersapi.ru',
        'https://raiders-front.ru',
        'https://rgw.zone/'
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => [
        'Origin',
        'Content-Type',
        'X-Auth-Token',
        'Authorization',
        'Accept',
        'X-Requested-With',
    ],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
