<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerTeam extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'player_team';

    protected $fillable = [
        'player_id',
        'team_season_id',
        'jersey_number',
        'start_date',
        'end_date',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function teamSeason(): BelongsTo
    {
        return $this->belongsTo(TeamSeason::class, 'team_season_id');
    }
}
