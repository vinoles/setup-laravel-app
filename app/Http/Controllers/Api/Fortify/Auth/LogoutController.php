<?php

namespace App\Http\Controllers\Api\Fortify\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse;

class LogoutController extends Controller
{
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function __invoke(Request $request): LogoutResponse
    {
        $request->user()->currentAccessToken()->delete();

        return app(LogoutResponse::class);
    }
}
