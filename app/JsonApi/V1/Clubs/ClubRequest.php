<?php

namespace App\JsonApi\V1\Clubs;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class ClubRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['bail','required','string', 'min:5', 'max:50'],
            'address' => ['bail','required','string', 'min:5', 'max:150'],
        ];
    }

}
