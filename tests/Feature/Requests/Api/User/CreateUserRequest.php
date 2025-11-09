<?php

namespace Tests\Feature\Requests\Api\User;

use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\Feature\Concerns\UsesRelationships;
use Tests\Feature\Requests\PostRequest;

class CreateUserRequest extends PostRequest
{
    use UsesRelationships;

    /**
     * Create a new instance of the request.
     *
     * @param  array  $relationship
     */
    public function __construct(?User $user = null, public array $relationships = [])
    {
        if ($user !== null) {
            $this->fillPayload($user);
        }
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('v1.api.users.store');
    }

    /**
     * Fill the payload of the request based on the given user and remote attribute parameter.
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

        $password = Str::random(mt_rand(8, 31)) . '!';

        $this->set('password', $password)
            ->set('password_confirmation', $password);

        return $this;
    }

    /**
     * Fill the payload of the request based on the given user.
     */
    public function setRole(UserRole $role): static
    {
        $this->set('role', $role);

        return $this;
    }

    /**
     * Retrieve type resource.
     */
    public function type(): string
    {
        return 'users';
    }

    /**
     * Fill the payload of the request based on the given user.
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

        $password = Str::random(mt_rand(8, 31)) . '!';

        $this->set('password', $password)
            ->set('password_confirmation', $password);

        $this->set('birthdate', $this->payload['birthdate']->format('Y-m-d'));

        return $this;
    }
}
