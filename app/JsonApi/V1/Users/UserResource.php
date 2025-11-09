<?php

namespace App\JsonApi\V1\Users;

use App\Models\User;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property User
 */
class UserResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param  Request|null  $request
     */
    public function attributes($request): iterable
    {
        return [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'phone'      => $this->phone,
            'address'    => $this->address,
            'city'       => $this->city,
            'province'   => $this->province,
            'birthdate'  => $this->birthdate,
        ];
    }

    public function deleteRules(): array
    {
        return [];
    }

    public function deleteMessages(): array
    {
        return [];
    }

    public function metaForDelete(User $user): array
    {
        return [];
    }
}
