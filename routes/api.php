<?php

use App\Helpers\HttpClient;
use App\Providers\HttpClientServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/log",function (Request $request, HttpClient $httpClient){

    $response = $httpClient->Get($request,[],"https://jsonplaceholder.typicode.com/posts/1");

    return response()->json($response);
});
