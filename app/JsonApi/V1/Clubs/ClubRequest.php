<?php

namespace App\JsonApi\V1\Clubs;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class ClubRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string', 'min:5', 'max:50'],
            'address' => ['bail', 'required', 'string', 'min:5', 'max:150'],
        ];
    }
}
