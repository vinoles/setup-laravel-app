<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use App\Observers\PostObserver;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([PostObserver::class])]
class Post extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuid;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'content',
        'slug',
        'title',
        'published_at',
        'author_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
