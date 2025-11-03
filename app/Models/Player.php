<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Player extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'nationality',
        'position',
        'height_cm',
        'weight_kg',
    ];

    public function playerTeams(): HasMany
    {
        return $this->hasMany(PlayerTeam::class);
    }

    public function playerStats(): HasMany
    {
        return $this->hasMany(PlayerStat::class);
    }

    public function authoredPosts(): MorphMany
    {
        return $this->morphMany(Post::class, 'author');
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
