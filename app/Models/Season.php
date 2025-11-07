<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'league_id',
        'name',
        'start_date',
        'end_date',
        'status_id',
    ];

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(SeasonStatus::class);
    }

    public function teamsSeasons(): HasMany
    {
        return $this->hasMany(TeamSeason::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
