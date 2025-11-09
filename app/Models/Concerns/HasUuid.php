<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait HasUuid
{
    protected static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            // Solo asigna si el modelo tiene una columna uuid y está vacía
            if ($model->isFillable('uuid') || Schema::hasColumn($model->getTable(), 'uuid')) {
                if (empty($model->uuid)) {
                    $model->uuid = (string) Str::uuid();
                }
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Initialize the model.
     */
    public function initializeHasUuid(): void
    {
        $this->fillable = array_merge($this->fillable, [
            'uuid',
        ]);
    }

    /**
     * Retrieve the model that matches the uuid.
     *
     * @param  \Illuminate\Datbase\Eloquent\Builder  $query
     */
    public function scopeUuid(Builder $query, string $uuid): Model
    {
        return $query->whereUuid($uuid)->first();
    }

    /**
     * Retrieve the models that matches the uuids.
     *
     * @param  \Illuminate\Datbase\Eloquent\Builder  $query
     */
    public function scopeUuids(Builder $query, array $uuids): Collection
    {
        return $query->whereIn('uuid', $uuids)->get();
    }

    /**
     * Check if the instance is missing the uuid.
     */
    public function missingUuid(): bool
    {
        return Arr::get($this->getAttributes(), 'uuid') === null;
    }
}
