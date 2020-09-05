<?php

namespace Jezzdk\LaravelRequestLog\Commands;

use Illuminate\Console\Command;
use Jezzdk\LaravelRequestLog\RequestLog;

class FlushRequestLogCommand extends Command
{
    public $signature = 'request-log:flush';

    public $description = 'Flush the entire request log';

    public function handle()
    {
        RequestLog::truncate();

        $this->comment('All done');
    }
}
