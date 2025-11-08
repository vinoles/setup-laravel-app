<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'club_id',
        'name',
        'short_name',
        'city',
        'logo_path',
    ];

    /**
     * Always include the owning club so API responses can expose it without extra queries.
     *
     * @var array<int, string>
     */
    protected $with = [
        'club',
    ];

    public function teamSeasons(): HasMany
    {
        return $this->hasMany(TeamSeason::class);
    }

    public function homeGames(): HasMany
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function awayGames(): HasMany
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function authoredPosts(): MorphMany
    {
        return $this->morphMany(Post::class, 'author');
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function getClubNameAttribute(): ?string
    {
        return optional($this->club)->name;
    }

    public static function getValidationRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'short_name' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:80'],
            'logo_path' => ['nullable', 'string', 'max:255'],
        ];
    }
}
