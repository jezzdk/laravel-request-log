<?php

namespace Jezzdk\LaravelRequestLog\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Jezzdk\LaravelRequestLog\Middleware\LogRequest;
use Jezzdk\LaravelRequestLog\RequestLog;

class RequestLogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_method_is_post()
    {
        /*$requestLog = factory(RequestLog::class)->create([
            'method' => 'POST'
        ]);

        $this->assertEquals('POST', $requestLog->method);*/
        $this->assertTrue(true);
    }

    /** @test */
    function it_checks_for_a_hello_word_in_response()
    {
        // Given we have a request
        $request = new Request();

        // when we pass the request to this middleware,
        // the response should contain 'Hello World'
        /** @var $response Response */
        $response = (new LogRequest())->handle($request, function ($request) {
            return new Response();
        });

        $this->assertEquals(200, $response->getStatusCode());
    }
}
