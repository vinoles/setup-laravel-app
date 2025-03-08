<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Auth\RegisterRequest;
use Tests\Feature\TestCase;

class RegisterWithMinimumAgeTest extends TestCase
{

    /**
     * Can register if the age is greater than or equal to 14
     *
     * @return void
     */
    #[Test]
    public function can_register_if_the_age_is_greater_than_or_equal_to_14(): void
    {
        $birthdate = now()->subYears(random_int(14, 20));

        $user = User::factory()
            ->withBirthdate($birthdate)
            ->make();

        $request = RegisterRequest::make($user);

        $response = $this->sendRequest($request);

        $response->assertSuccessful();
    }

    /**
     * Cannot register if the age is less than or equal to 14
     *
     * @return void
     */
    #[Test]
    public function cannot_register_if_the_age_is_less_than_or_equal_to_14(): void
    {
        $birthdate = now()->subYears(random_int(1, 13));

        $user = User::factory()
            ->withBirthdate($birthdate)
            ->make();

        $request = RegisterRequest::make($user);

        $response = $this
            ->sendRequest($request);

        $response->assertJsonValidationErrors('birthdate');

        $allowedBirthdate = Carbon::now()
            ->subYears(config('app.minimum_age'))->format('Y-m-d');

        $response->assertUnprocessable();

        $response->assertInvalid([
            'birthdate' => trans(
                'validation.before_or_equal',
                [
                    'attribute' => 'birthdate',
                    'date' => $allowedBirthdate,
                ]
            ),
        ]);
    }
}
