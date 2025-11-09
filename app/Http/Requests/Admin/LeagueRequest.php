<?php

namespace App\Http\Requests\Admin;

use App\Models\League;
use Illuminate\Foundation\Http\FormRequest;

class LeagueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return array_merge(
            League::getValidationRules(),
            [
                'sport_id'      => ['nullable', 'integer', 'exists:sports,id'],
                'federation_id' => ['required', 'integer', 'exists:federations,id'],
            ]
        );
    }

    public function attributes(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }
}
