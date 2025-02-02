<?php

namespace Tests\Feature\Auth;

use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Auth\RegisterRequest;
use Tests\Feature\TestCase;

class RegisterTest extends TestCase
{

    /**
     * Sign up happy path
     *
     * @return void
     */
    #[Test]
    public function sign_up_happy_path(): void
    {
        $user = User::factory()->make();

        $request = RegisterRequest::make($user);

        $response = $this->sendRequest($request);

        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'address' => $user->address,
            'city' => $user->city,
            'country' => $user->country,
            'postal_code' => $user->postal_code,
            'phone' => $user->phone,
        ]);
    }

    /**
     * Sign up and create user profile
     *
     * @return void
     */
    #[Test]
    public function sign_up_and_create_user_profile(): void
    {
        $user = User::factory()->make();

        $request = RegisterRequest::make($user);

        $response = $this->sendRequest($request);

        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'address' => $user->address,
            'city' => $user->city,
            'country' => $user->country,
            'postal_code' => $user->postal_code,
            'phone' => $user->phone,
        ]);
    }
}
