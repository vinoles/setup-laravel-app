<?php

namespace App\JsonApi\V1\Players;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class PlayerRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:80',
            'birthdate' => 'nullable|date',
            'nationality' => 'nullable|max:80',
            'position' => 'nullable|max:40',
            'height_cm' => 'nullable|integer',
            'weight_kg' => 'nullable|integer',
        ];
    }

}
