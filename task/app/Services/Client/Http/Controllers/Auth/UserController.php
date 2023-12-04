<?php

namespace App\Services\Client\Http\Controllers\Auth;

use Lucid\Units\Controller;
use Illuminate\Http\JsonResponse;
use App\Services\Client\Features\Auth\UserFeature;
use App\Services\Client\Features\User\EditUserFeature;
use App\Services\Client\Features\User\DeleteUserFeature;
use App\Services\Client\Features\User\UpdateUserFeature;
use App\Services\Client\Features\Auth\UserRegisterFeature;
use App\Services\Client\Features\Auth\GetUserByAuthFeature;

class UserController extends Controller
{
    public function login(): JsonResponse
    {
        return $this->serve(UserFeature::class);
    }

    public function register(): JsonResponse
    {
        return $this->serve(UserRegisterFeature::class);
    }


    public function index(): JsonResponse
    {
        return $this->serve(EditUserFeature::class);
    }
    public function edit($id): JsonResponse
    {
        return $this->serve(UpdateUserFeature::class, compact('id'));
    }

    public function update($id): JsonResponse
    {
        return $this->serve(GetUserByAuthFeature::class, compact('id'));
    }

    public function destroy(): JsonResponse
    {
        return $this->serve(DeleteUserFeature::class, compact('id'));
    }
}
