<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeamSeason extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'teams_seasons';

    protected $fillable = [
        'team_id',
        'season_id',
        'group',
        'seed',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function playerTeams(): HasMany
    {
        return $this->hasMany(PlayerTeam::class, 'team_season_id');
    }
}
