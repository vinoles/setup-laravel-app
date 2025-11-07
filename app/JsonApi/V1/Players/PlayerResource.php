<?php

namespace App\JsonApi\V1\Players;

use App\Models\Player;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Player $resource
 */
class PlayerResource extends JsonApiResource
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
            'firstName' => $this->resource->first_name,
            'lastName' => $this->resource->last_name,
            'birthdate' => $this->resource->birthdate,
            'nationality' => $this->resource->nationality,
            'position' => $this->resource->position,
            'heightCm' => $this->resource->height_cm,
            'weightKg' => $this->resource->weight_kg,
            'createdAt' => $this->resource->created_at,
            'updatedAt' => $this->resource->updated_at,
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
