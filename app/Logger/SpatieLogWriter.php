<?php

namespace App\Logger;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\HttpLogger\LogWriter;

class SpatieLogWriter implements LogWriter
{

    public function logRequest(Request $request)
    {
        Log::info("spatie log request");
    }
}
