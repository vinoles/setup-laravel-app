<?php

namespace App\Http\Requests\Api;

use App\Actions\Fortify\PasswordValidationRules;
use App\Constants\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $allowedBirthdate = now()
            ->subYears(config('app.minimum_age'))->format('Y-m-d');

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
            'phone' => ['required', 'string', 'min:10', 'max:20'],
            'address' => ['required', 'string', 'max:150'],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:25'],
            'birthdate' => [
                'required',
                'date',
                "before_or_equal:{$allowedBirthdate}",
            ],
            //TODO refactor roles
            // 'role' => ['required', 'string', Rule::enum(UserRole::class)],
            'password' => $this->passwordRules(),
        ];
    }
}
