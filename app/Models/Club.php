<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Club extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasUuid;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name',
        'address',
    ];
}
