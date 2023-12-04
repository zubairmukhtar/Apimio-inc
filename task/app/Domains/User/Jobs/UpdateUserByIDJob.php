<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Lucid\Units\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UpdateUserByIDJob extends Job
{
    protected  int|null $id;
    protected $password;


    public function __construct( int|null $id, $password)
    {
        $this->id = $id;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): JsonResponse
    {
        $user = User::findOrFail($this->id);
        $user->password = Hash::make($this->password);
        $user->save();

        return response()->json($user);
    }
}
