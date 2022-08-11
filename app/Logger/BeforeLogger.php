<?php

namespace App\Logger;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BeforeLogger
{
    public function handle(Request $request, Closure $next)
    {
        $threadId = Str::random(12);
        $data = [
            "Thread" => $threadId,
            'Path' => $request->getRequestUri(),
            'Method' => $request->method(),
            'Header' => $request->header(),
            'Body' => json_decode($request->getContent(), true),
        ];

        $request->merge(["thread" => $threadId]);
        Log::info('Incoming Request', $data);

        return $next($request);
    }
}
