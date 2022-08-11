<?php

namespace App\Helpers;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HttpClient
{

    public function Get(Request $context, $headers, $url): PromiseInterface|Response
    {
        $this->logRequest($context, $url, "GET", $headers, null);
        $response = Http::withHeaders($headers)->get($url);
        $this->logResponse($context, $url, "GET", $response->headers(), $response->body());
        return $response;
    }

    private function logRequest(Request $context, $url, $method, $header, $body)
    {
        $threadId = $context->get("thread");
        $data = [
            "Thread" => $threadId,
            'Path' => $url,
            'Method' => $method,
            'Header' => $header,
            'Body' => $body,
        ];

        Log::info('HTTP Request', $data);
    }

    private function logResponse(Request $context, $url, $method, $header, $body)
    {
        $threadId = $context->get("thread");
        $data = [
            "Thread" => $threadId,
            'Path' => $url,
            'Method' => $method,
            'Header' => $header,
            'Response' => json_decode($body,true),
        ];

        Log::info('HTTP Response', $data);
    }

}
