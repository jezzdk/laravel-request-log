<?php

namespace Jezzdk\LaravelRequestLog\Tests\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Jezzdk\LaravelRequestLog\Commands\CleanRequestLogCommand;
use Jezzdk\LaravelRequestLog\RequestLog;
use Jezzdk\LaravelRequestLog\Tests\TestCase;

class FlushRequestLogCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_deletes_all_entries_in_the_database()
    {
        factory(RequestLog::class, 10)->create();

        $this->assertDatabaseCount('request_log', 10);

        Artisan::call('request-log:flush');

        $this->assertDatabaseCount('request_log', 0);
    }
}
