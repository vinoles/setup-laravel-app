<?php

namespace Tests\Feature\Requests\Api\User;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\Feature\Requests\PostRequest;

class UpdateUserRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  User|null  $user
     */
    public function __construct(protected User|null $user = null)
    {
        if ($user === null) {
            $this->user = $user = User::factory()->create();
        }
    }


    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('v1.api.users.update', ['user' => $this->user]);
    }

    /**
     * Fill the payload of the request based on the given user.
     *
     * @param  User  $user
     * @return static
     */
    public function fillPayload(User $user): static
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


        $this->set('birthdate', $this->payload['birthdate']->format('Y-m-d'));


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
    * Retrieve type resource.
    *
    * @return string
    */
    public function type(): string
    {
        return 'users';
    }

    /**
    * Retrieve uuid model
    *
    * @return string
    */
    public function modelUuid(): string
    {
        return $this->user->uuid;
    }
}
