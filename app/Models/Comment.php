<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use App\Observers\CommentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([CommentObserver::class])]
class Comment extends Model
{
    use HasFactory,
        HasUuid;

    /**
     * @var string[]
     */
    protected $fillable = [
        'content',
        'post_id',
        'user_id',
    ];

    /**
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
