<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use CrudTrait;
    use HasFactory,
        HasUuid;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name',
        'address',
    ];

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
}
