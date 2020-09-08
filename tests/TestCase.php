<?php

namespace Jezzdk\LaravelRequestLog\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Jezzdk\LaravelRequestLog\RequestLogServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/database/factories');

        if (!defined('LARAVEL_START')) {
            define('LARAVEL_START', microtime(true));
        }
    }

    protected function getPackageProviders($app)
    {
        return [
            RequestLogServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        include_once __DIR__.'/../database/migrations/create_request_log_table.php.stub';
        (new \CreateRequestLogTable())->up();
    }
}
