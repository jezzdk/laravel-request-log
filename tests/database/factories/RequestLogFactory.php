<?php

use \Faker\Generator;
use Jezzdk\LaravelRequestLog\RequestLog;

/* @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(RequestLog::class, function (Generator $faker) {
    return [
        'method' => 'GET',
        'url' => $faker->url,
        'duration' => 2000,
        'status_code' => 200,
        'ip' => $faker->ipv4,
        'user_agent' => $faker->userAgent,
        'referer' => $faker->safeEmailDomain,
        'content_length' => 1024,
    ];
});
