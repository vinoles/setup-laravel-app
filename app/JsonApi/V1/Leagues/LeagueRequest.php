<?php

namespace App\JsonApi\V1\Leagues;

use App\Models\League;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class LeagueRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(
            [
                'federation' => ['required', JsonApiRule::toOne()],
            ],
            League::getValidationRules()
        );
    }
}
