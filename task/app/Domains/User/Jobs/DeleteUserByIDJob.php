<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Lucid\Units\Job;
use Illuminate\Http\JsonResponse;

class DeleteUserByIDJob extends Job
{
    protected int $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): JsonResponse
    {
        $user = User::findOrFail($this->id);
        $user->delete();

        return response()->json("User Successfully Deleted");
    }
}
