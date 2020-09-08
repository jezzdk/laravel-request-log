# Laravel Request Log.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jezzdk/laravel-request-log.svg?style=flat-square)](https://packagist.org/packages/jezzdk/laravel-request-log)
[![Total Downloads](https://img.shields.io/packagist/dt/jezzdk/laravel-request-log.svg?style=flat-square)](https://packagist.org/packages/jezzdk/laravel-request-log)

Log all requests in the database. This package will *not* store payloads.

## Installation

You can install the package via composer:

```bash
composer require jezzdk/laravel-request-log
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Jezzdk\LaravelRequestLog\RequestLogServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Jezzdk\LaravelRequestLog\RequestLogServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [

    /**
     * Enable the request log (default is false).
     */
    'enabled' => env('REQUEST_LOG_ENABLED', false),

    /**
     * Max age in days.
     *
     * Entries older than this will be deleted by the scheduled task.
     */
    'max_age' => 90,

    /**
     * The model used for storing the request data.
     *
     * You might want to override this if you're using a multi-tenancy package,
     * or if you want to store other data.
     */
    'model' => Jezzdk\LaravelRequestLog\RequestLog::class,

];
```

## Usage

Add the following middleware anywhere in the middleware stack where you want to log requests:

```php
// app/Http/Kernel.php
protected $middleware = [
    ...
    \Jezzdk\LaravelRequestLog\Middleware\LogRequest::class
]
```

Add the clean command as a scheduled task:

```php
// app/Console/Kernel.php

$schedule->command('request-log:clean')->daily();
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email jess@stopa.dk instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
