<?php

namespace Jezzdk\LaravelRequestLog;

use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{
    protected $table = 'request_log';

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'method',
        'url',
        'duration',
        'status_code',
        'ip',
        'user_agent',
        'referer',
        'content_length',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'status_code' => 'integer',
        'content_length' => 'integer',
    ];
}
