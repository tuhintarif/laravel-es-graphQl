<?php

use Illuminate\Support\Str;

return [
    'hosts' => [
        'dev' => [
            'host' => env('ELASTICSEARCH_HOST', 'localhost'),
            'port' => env('elasticsearch_port', '9200'),
            'user' => env('ELASTICSEARCH_USER', ''),
            'password' => env('elasticsearch_pass', ''),
        ],
    ],
];
