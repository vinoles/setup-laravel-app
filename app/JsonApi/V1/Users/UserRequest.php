<?php

namespace App\JsonApi\V1\Users;

use App\Actions\Fortify\PasswordValidationRules;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class UserRequest extends ResourceRequest
{
    use PasswordValidationRules;


    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        $allowedBirthdate = now()
                    ->subYears(config('app.minimum_age'))
                    ->format('Y-m-d');

        return [
            'email' => [
                'bail',
                'required',
                'string',
                'email',
                'unique:users',
            ],
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'birthdate' => [
                'required',
                'date',
                "before_or_equal:{$allowedBirthdate}",
            ],
            'address' => ['nullable', 'max:150'],
            'city' => ['nullable', 'max:50'],
            'country' => ['nullable', 'max:50'],
            'postal_code' => ['nullable', 'max:50'],
            'phone' => ['nullable', 'max:20'],
            'password' => $this->passwordRules(),
        ];
    }
}
