<?php

namespace App\JsonApi\V1\Clubs;

use App\Models\Club;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Club $resource
 */
class ClubResource extends JsonApiResource
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
            'name' => $this->name,
            'address' => $this->address,
        ];
    }

    /**
     * Get the resource's relationships.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function relationships($request): iterable
    {
        return [
            // @TODO
        ];
    }

}
