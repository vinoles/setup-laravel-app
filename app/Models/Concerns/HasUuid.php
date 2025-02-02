<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

trait HasUuid
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Initialize the model.
     *
     * @return void
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
     * @param  string  $uuid
     * @return Model
     */
    public function scopeUuid(Builder $query, string $uuid): Model
    {
        return $query->whereUuid($uuid)->first();
    }

    /**
     * Retrieve the models that matches the uuids.
     *
     * @param  \Illuminate\Datbase\Eloquent\Builder  $query
     * @param  array  $uuids
     * @return Collection
     */
    public function scopeUuids(Builder $query, array $uuids): Collection
    {
        return $query->whereIn('uuid', $uuids)->get();
    }

    /**
     * Check if the instance is missing the uuid.
     *
     * @return bool
     */
    public function missingUuid(): bool
    {
        return Arr::get($this->getAttributes(), 'uuid') === null;
    }
}
