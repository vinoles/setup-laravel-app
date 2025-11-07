<?php

namespace App\JsonApi\V1\Teams;

use App\Models\Team;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Team $resource
 */
class TeamResource extends JsonApiResource
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
            'name' => $this->resource->name,
            'short_name' => $this->resource->short_name,
            'city' => $this->resource->city,
            'logo_path' => $this->resource->logo_path,
            'club' => $this->transformClub(),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }

    /**
     * Build the club payload when available.
     *
     * @return array<string,string>|null
     */
    private function transformClub(): ?array
    {
        if (! $this->resource->relationLoaded('club')) {
            return null;
        }

        $club = $this->resource->club;

        if ($club === null) {
            return null;
        }

        return [
            'id' => $club->uuid,
            'name' => $club->name,
            'address' => $club->address,
        ];
    }
}
