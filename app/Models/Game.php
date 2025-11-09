<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'season_id',
        'home_team_id',
        'away_team_id',
        'kickoff_at',
        'venue',
        'status_id',
        'home_score',
        'away_score',
        'round',
        'stage',
    ];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(GameStatus::class);
    }

    public function referees(): HasMany
    {
        return $this->hasMany(GameReferee::class);
    }

    public function playerStats(): HasMany
    {
        return $this->hasMany(PlayerStat::class);
    }

    public function teamStats(): HasMany
    {
        return $this->hasMany(TeamStat::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
