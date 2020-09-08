<?php

namespace Jezzdk\LaravelRequestLog\Tests;

use Jezzdk\LaravelRequestLog\RequestLog;

class RequestLogTest extends TestCase
{
    /** @test */
    public function the_data_is_set()
    {
        $requestLog = factory(RequestLog::class)->create([
            'method' => 'POST'
        ]);

        $this->assertEquals('POST', $requestLog->method);
    }
}
