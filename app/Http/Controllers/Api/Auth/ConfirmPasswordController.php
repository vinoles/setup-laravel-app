<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ConfirmPasswordRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Fortify;
use LaravelJsonApi\Core\Responses\MetaResponse;

// use LaravelJsonApi\Core\Responses\MetaResponse;

class ConfirmPasswordController extends Controller
{
    /**
     * Confirm that the given password is valid for the given user.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @param  mixed  $user
     * @param  string|null  $password
     * @return bool
     */
    public function __invoke(ConfirmPasswordRequest $request, User $user, StatefulGuard $guard): MetaResponse
    {
        $password = $request->get('password');

        $username = Fortify::username();

        $confirm = is_null(Fortify::$confirmPasswordsUsingCallback)
            ? $guard->validate([
                $username => $user->{$username},
                'password' => $password,
            ])
            : $this->confirmPasswordUsingCustomCallback($user, $password);

        return MetaResponse::make(['status' => $confirm]);
    }

    /**
     * Confirm the user's password using a custom callback.
     *
     * @param  mixed  $user
     * @param  string|null  $password
     * @return bool
     */
    protected function confirmPasswordUsingCustomCallback($user, ?string $password = null)
    {
        return call_user_func(
            Fortify::$confirmPasswordsUsingCallback,
            $user,
            $password
        );
    }
}
