<?php

namespace App\JsonApi\V1\Federations;

use App\Models\Federation;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class FederationRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     */
    public function rules(): array
    {
        return Federation::getValidationRules();
    }
}
