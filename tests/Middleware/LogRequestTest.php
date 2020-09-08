<?php

namespace Jezzdk\LaravelRequestLog\Tests\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Queue;
use Jezzdk\LaravelRequestLog\Jobs\LogRequest as LogRequestJob;
use Jezzdk\LaravelRequestLog\Middleware\LogRequest;
use Jezzdk\LaravelRequestLog\Tests\TestCase;

class LogRequestTest extends TestCase
{
    /** @test */
    public function it_doesnt_dispatch_a_job_if_logging_is_disabled()
    {
        Queue::fake();

        $request = new Request();

        (new LogRequest())->handle($request, function ($request) {
            return new Response();
        });

        Queue::assertNothingPushed();
    }

    /** @test */
    public function it_dispatches_a_job_if_enabled()
    {
        Queue::fake();

        config(['request-log.enabled' => true]);

        $request = new Request();

        (new LogRequest())->handle($request, function ($request) {
            return new Response();
        });

        Queue::assertPushed(LogRequestJob::class);
    }

    /** @test */
    public function it_returns_a_successful_response()
    {
        $request = new Request();

        /** @var $response Response */
        $response = (new LogRequest())->handle($request, function ($request) {
            return new Response();
        });

        $this->assertEquals(200, $response->getStatusCode());
    }
}
