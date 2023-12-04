<?php

namespace App\Services\Client\Features\User;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\User\Jobs\DeleteUserByIDJob;

class DeleteUserFeature extends Feature
{
    protected int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }


    public function handle(Request $request)
    {
        return $this->run(new DeleteUserByIDJob($this->id));
    }
}
