<?php

namespace App\JsonApi\V1\Players;

use App\Models\Player;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class PlayerRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return Player::getValidationRules();
    }

}
