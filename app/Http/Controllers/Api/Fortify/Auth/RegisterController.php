<?php

namespace App\Http\Controllers\Api\Fortify\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use LaravelJsonApi\Core\Responses\DataResponse;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  RegisterRequest  $request
     */
    public function __invoke(RegisterRequest $request)
    {
        $attributes = $request->validated();

        $birthdate = Arr::pull($attributes, 'birthdate');

        $user = User::create(
            array_merge(
                [
                    'uuid' => Str::uuid(),
                    'birthdate' => Carbon::parse($birthdate)->format('Y-m-d')
                ],
                $attributes
            )
        );

        $tokenName = $user->email . $user->uuid . $user->password;

        $token = $user->createToken($tokenName)->plainTextToken;

        return DataResponse::make($user)
            ->withMeta(['token' => $token]);
    }
}
