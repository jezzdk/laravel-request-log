<?php

namespace Jezzdk\LaravelRequestLog\Tests\Jobs;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Jezzdk\LaravelRequestLog\Jobs\LogRequest as LogRequestJob;
use Jezzdk\LaravelRequestLog\Tests\TestCase;

class LogRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_the_data()
    {
        $job = new LogRequestJob([
            'method' => 'POST',
            'url' => 'api/books',
            'duration' => 300,
            'status_code' => 201,
            'ip' => '127.0.0.1',
            'user_agent' => 'Mozilla',
            'referer' => null,
            'content_length' => 1024,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $job->handle();

        $this->assertDatabaseHas('request_log', [
            'method' => 'POST',
            'url' => 'api/books',
            'duration' => 300,
            'status_code' => 201,
            'ip' => '127.0.0.1',
            'user_agent' => 'Mozilla',
            'referer' => null,
            'content_length' => 1024,
        ]);
    }
}
