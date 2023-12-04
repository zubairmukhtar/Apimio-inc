<?php

namespace App\Services\Client\Features\User;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Domains\User\Jobs\UpdateUserByIDJob;

class UpdateUserFeature extends Feature
{
    protected int|null $id;
    protected $password;

    public function __construct(Request $request)
    {
        $this->id = $request->id;
        $this->password = $request->password;
    }

    public function handle(Request $request): JsonResponse
    {
        return $this->run(new UpdateUserByIDJob($this->id, $this->password));
    }
}
