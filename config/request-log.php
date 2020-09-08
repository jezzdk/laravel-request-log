<?php

return [

    /**
     * Enable the request log (default is false).
     */
    'enabled' => env('REQUEST_LOG_ENABLED', false),

    /**
     * Max age in days.
     *
     * Entries older than this will be deleted by the scheduled task.
     */
    'max_age' => 90,

    /**
     * The model used for storing the request data.
     *
     * You might want to override this if you're using a multi-tenancy package,
     * or if you want to store other data.
     */
    'model' => Jezzdk\LaravelRequestLog\RequestLog::class,

];
