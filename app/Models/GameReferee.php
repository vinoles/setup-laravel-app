<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameReferee extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'game_id',
        'referee_id',
        'role_id',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function referee(): BelongsTo
    {
        return $this->belongsTo(Referee::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(RefereeRole::class);
    }
}
