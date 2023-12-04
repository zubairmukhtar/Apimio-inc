<?php

namespace App\Services\Client\Features\User;

use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdateUserFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run();
    }
}
