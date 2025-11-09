<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Federation extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'type',
        'acronym',
        'country',
        'foundation_year',
        'website',
        'contact_email',
    ];

    public function leagues(): HasMany
    {
        return $this->hasMany(League::class);
    }
}
