<?php

namespace App\Services\Client\Features\Auth;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Auth\Jobs\UserRegisterJob;
use App\Domains\Auth\Requests\UserRegisterValidate;

class UserRegisterFeature extends Feature
{

    protected $data;

    public function __construct(UserRegisterValidate $request)
    {
        $this->data = $request->validated();
    }

    public function handle(Request $request)
    {
        return $this->run(new UserRegisterJob($this->data));
    }
}
