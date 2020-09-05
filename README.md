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
];
```

## Usage

Add the following middleware anywhere in the middleware stack where you want to log requests:

``` php
\Jezzdk\LaravelRequestLog\Middleware\LogRequest::class,
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
