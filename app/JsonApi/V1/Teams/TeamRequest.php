<?php

namespace App\JsonApi\V1\Teams;

use App\Models\Team;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class TeamRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     */
    public function rules(): array
    {
        return array_merge(
            [
                'club' => ['nullable', JsonApiRule::toOne()],
            ],
            Team::getValidationRules()
        );
    }
}
