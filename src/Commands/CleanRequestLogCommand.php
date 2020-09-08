<?php

namespace Jezzdk\LaravelRequestLog\Commands;

use Illuminate\Console\Command;
use Jezzdk\LaravelRequestLog\RequestLog;

class CleanRequestLogCommand extends Command
{
    public $signature = 'request-log:clean';

    public $description = 'Delete entries older than the max age set in config';

    public function handle()
    {
        $maxAge = config('request-log.max_age', 90);

        RequestLog::where('created_at', '<', now()->subDays($maxAge))->delete();

        $this->comment('All done');
    }
}
