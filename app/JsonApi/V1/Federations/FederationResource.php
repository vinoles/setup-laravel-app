<?php

namespace App\JsonApi\V1\Federations;

use App\Models\Federation;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Federation
 */
class FederationResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param  Request|null  $request
     */
    public function attributes($request): iterable
    {
        return [
            'name'            => $this->name,
            'type'            => $this->type,
            'acronym'         => $this->acronym,
            'country'         => $this->country,
            'foundation_year' => $this->foundation_year,
            'website'         => $this->website,
            'email'           => $this->email,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
