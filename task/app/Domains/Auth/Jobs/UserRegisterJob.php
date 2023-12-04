<?php

namespace App\Domains\Auth\Jobs;

use Lucid\Units\Job;
use App\Models\User;


class UserRegisterJob extends Job
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
     * @return void
     */

    public function handle()
    {
        // Create a new user using the provided data
        $data = User::create([
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return response()->json($data);
    }
}
