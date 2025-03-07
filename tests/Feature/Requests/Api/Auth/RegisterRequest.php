<?php

namespace Tests\Feature\Requests\Api\Auth;

use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\Feature\Requests\PostRequest;

class RegisterRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  User  $user
     */
    public function __construct(User $user = null)
    {
        if ($user !== null) {
            $this->fillPayload($user);
        }
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('v1.api.auth.register');
    }

    /**
     * Fill the payload of the request based on the given user.
     *
     * @param  User  $user
     * @return static
     */
    protected function fillPayload(User $user): static
    {
        $this->payload = array_filter(
            Arr::except(
                $user->getAttributes(),
                [
                    'uuid',
                    'updated_at',
                    'created_at',
                    'id',
                ]
            ),
            static fn ($value) => $value !== null
        );

        $password = Str::random(mt_rand(8, 31)).'!';

        $this->set('password', $password)
            ->set('password_confirmation', $password);

        $this->set('role', UserRole::random());

        return $this;
    }

    /**
     * Fill the payload of the request based on the given user and remote attribute parameter.
     *
     * @param  User  $user
     * @param  array  $attributes
     * @return static
     */
    public function fillPayloadAndRemoveAttribute(User $user, array $attributes): static
    {
        $this->payload = array_filter(
            Arr::except(
                $user->getAttributes(),
                array_merge(
                    [
                        'uuid',
                        'updated_at',
                        'created_at',
                        'id',
                    ],
                    $attributes
                )
            ),
            static fn ($value) => $value !== null
        );

        $password = Str::random(mt_rand(8, 31)).'!';

        $this->set('password', $password)
            ->set('password_confirmation', $password);

        return $this;
    }

    /**
     * Fill the payload of the request based on the given user.
     *
     * @param  UserRole  $role
     * @return static
     */
    public function setRole(UserRole $role): static
    {
        $this->set('role', $role);

        return $this;
    }
}
