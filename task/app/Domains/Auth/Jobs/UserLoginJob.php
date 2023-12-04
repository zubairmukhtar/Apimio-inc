<?php

namespace App\Domains\Auth\Jobs;

use Lucid\Units\Job;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class UserLoginJob extends Job
{
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return JsonResponse
     */
    public function handle(): JsonResponse
    {
        $email = $this->data['email'];
        $password = $this->data['password'];

        // Attempt to authenticate the user
        if ($token = JWTAuth::attempt(['email' => $email, 'password' => $password])) {
            // Return the token as a JSON response
            return response()->json(['token' => $token]);
        }

        // Authentication failed
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
