<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamStat extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'team_stats';

    protected $fillable = [
        'game_id',
        'team_id',
        'metrics',
    ];

    protected $casts = [
        'metrics' => 'array',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
