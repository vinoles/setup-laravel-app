<?php

namespace App\Http\Controllers\Api\Fortify\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use LaravelJsonApi\Core\Responses\DataResponse;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  SignInRequest  $request
     * @return DataResponse
     */
    public function __invoke(SignInRequest $request): DataResponse
    {
        $email = $request->get('email');

        $password = $request->get('password');

        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        $tokenName = $user->email . $user->uuid . $user->password;

        $token = $user->createToken($tokenName)->plainTextToken;

        return DataResponse::make($user)
            ->withMeta(['token' => $token]);
    }
}
