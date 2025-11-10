<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class League extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'federation_id',
        'sport_id',
        'name',
        'country',
    ];

    public static function getValidationRules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:150'],
            'country' => ['nullable', 'string', 'max:80'],
        ];
    }

    public function federation(): BelongsTo
    {
        return $this->belongsTo(Federation::class);
    }

    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
