<?php

namespace App\Logger;

use Illuminate\Http\Request;
use Spatie\HttpLogger\LogProfile;

class SpatieLogProfile implements LogProfile
{

    public function shouldLogRequest(Request $request): bool
    {
        return true;
    }
}
