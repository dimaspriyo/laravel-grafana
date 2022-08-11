<?php

namespace App\Providers;

use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class HttpClientServiceProviders extends ServiceProvider
{

    public function register()
    {
   $this->app->singleton(Http::class,function (){
       return new HttpClient();
   });
    }

    public function provides()
    {
     return[
         HttpClient::class,
     ];
    }

}
