<?php

namespace App\JsonApi\V1\Teams;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class TeamRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string', 'max:120'],
            'short_name' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:80'],
            'logo_path' => ['nullable', 'string', 'max:255'],
            'club' => ['nullable', JsonApiRule::toOne('clubs')],
        ];
    }
}
