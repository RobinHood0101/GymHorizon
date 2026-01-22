<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class Logger
{
    public function log($message): void
    {
        Log::info($message);
    }
}
