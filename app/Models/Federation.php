<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Federation extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'type',
        'acronym',
        'country',
        'foundation_year',
        'website',
        'contact_email',
    ];

    public function leagues(): HasMany
    {
        return $this->hasMany(League::class);
    }

    public static function getValidationRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'type' => ['nullable', 'string', 'max:60'],
            'acronym' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:80'],
            'foundation_year' => ['nullable', 'integer', 'min:1800', 'max:' . now()->year],
            'website' => ['nullable', 'string', 'max:255', 'url'],
            'contact_email' => ['nullable', 'string', 'email', 'max:120'],
        ];
    }
}
