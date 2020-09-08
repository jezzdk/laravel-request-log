<?php

namespace Jezzdk\LaravelRequestLog\Tests\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Jezzdk\LaravelRequestLog\Commands\CleanRequestLogCommand;
use Jezzdk\LaravelRequestLog\RequestLog;
use Jezzdk\LaravelRequestLog\Tests\TestCase;

class CleanRequestLogCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_deletes_old_entries_in_the_database()
    {
        factory(RequestLog::class)->create([
            'created_at' => now()
        ]);

        factory(RequestLog::class)->create([
            'created_at' => now()->subDays(100)
        ]);

        Artisan::call('request-log:clean');

        $this->assertDatabaseCount('request_log', 1);
    }
}
