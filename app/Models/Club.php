<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use App\Observers\ClubObserver;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([ClubObserver::class])]
class Club extends Model
{
    use CrudTrait;
    /** @use HasFactory<\Database\Factories\ClubFactory> */
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
}
