<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Lucid\Units\Job;

class EditUserByIDJob extends Job
{
    protected int $id;

    public function __construct($id)
    {
        $this->id = $id;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = User::findOrFail($this->id);

        if (is_null($data)) {
            return response()->json(['status' => 404]);
        }

        return response()->json($data);
    }
}
