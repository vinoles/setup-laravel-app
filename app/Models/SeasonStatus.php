<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeasonStatus extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'code',
        'name',
    ];
}
