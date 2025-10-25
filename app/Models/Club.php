<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use CrudTrait;
    /** @use HasFactory<\Database\Factories\ClubFactory> */
    use HasFactory;
}
