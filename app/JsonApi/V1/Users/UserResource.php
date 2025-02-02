<?php

namespace App\JsonApi\V1\Users;

use App\Models\User;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property User $resource
 */
class UserResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function attributes($request): iterable
    {
        return [
            'id' => $this->uuid,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'province' => $this->province,
            'birthdate' => $this->birthdate,
        ];
    }

    /**
     * @return array
     */
    public function deleteRules(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function deleteMessages(): array
    {
        return [];
    }

    /**
     * @param User $user
     * @return array
     */
    public function metaForDelete(User $user): array
    {
        return [];
    }
}
