<?php

namespace App\Services\Client\Features\Auth;

use Lucid\Units\Feature;
use Illuminate\Http\Request; // Use Laravel's Request class
use Illuminate\Http\JsonResponse;
use App\Domains\Auth\Jobs\UserLoginJob;
use App\Domains\Auth\Requests\UserValidate;

class UserFeature extends Feature
{
    protected $data;

    public function __construct(UserValidate $request)
    {
        $this->data = $request->validated();

    }

    public function handle(Request $request): JsonResponse
    {

        return $this->run(new UserLoginJob($this->data));
    }
}
