<?php

namespace App\Services\Client\Features\User;

use App\Domains\User\Jobs\EditUserByIDJob;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class EditUserFeature extends Feature
{

    protected int $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(Request $request)
    {
        return $this->run(new EditUserByIDJob($this->id));
    }
}
