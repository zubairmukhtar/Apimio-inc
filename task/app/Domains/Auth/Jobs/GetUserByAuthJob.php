<?php

namespace App\Domains\Auth\Jobs;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Job;
use Tymon\JWTAuth\Facades\JWTAuth;

class GetUserByAuthJob extends Job
{

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle():JsonResponse
    {
        try {
            // Attempt to get the user from the JWT token
            if ($token = JWTAuth::parseToken()) {
                $user = $token->authenticate();

                return response()->json($user);
            }
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            // Handle exception if the token is invalid
            return response()->json(null);
        }

        return response()->json(null);
    }
}
