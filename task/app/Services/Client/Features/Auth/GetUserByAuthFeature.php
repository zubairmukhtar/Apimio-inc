<?php

namespace App\Services\Client\Features\Auth;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Auth\Jobs\GetUserByAuthJob;

class GetUserByAuthFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new GetUserByAuthJob());
    }
}
