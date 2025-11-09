<?php

namespace App\JsonApi\V1\Teams;

use App\Models\Team;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Team
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
            'name' => $this->name,
            'short_name' => $this->short_name,
            'city' => $this->city,
            'logo_path' => $this->logo_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    /**
     * Build the club payload when available.
     *
     * @return array<string,string>|null
     */
    private function transformClub(): ?array
    {
        if (!  $this->relationLoaded('club')) {
            return null;
        }

        $club = $this->club;

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
