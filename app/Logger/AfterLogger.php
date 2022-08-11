<?php

namespace App\Logger;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AfterLogger
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $threadId = $request->get("thread");
        $data = [
            'Thread' => $threadId,
            'Path' => $request->getRequestUri(),
            'Method' => $request->method(),
            'Header' => $request->header(),
            'Response' => json_decode($response->getContent(), true),
        ];

        $request["thread_id"] = $threadId;
        Log::info('Outgoing Request', $data);
        return $response;
    }
}
