<?php

namespace App\JsonApi\V1\Federations;

use App\Models\Federation;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class FederationSchema extends Schema
{
    /**
     * The model the schema corresponds to.
     *
     * @var class-string<Federation>
     */
    public static string $model = Federation::class;

    /**
     * Get the resource fields.
     */
    public function fields(): array
    {
        return [
            ID::make()->uuid(),

            HasMany::make('leagues'),

            Str::make('name'),
            Str::make('type'),
            Str::make('acronym'),
            Str::make('country'),
            Number::make('foundation_year'),
            Str::make('website'),
            Str::make('email'),

            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
        ];
    }

    /**
     * Get the resource filters.
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
        ];
    }

    /**
     * Get the resource paginator.
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }

    /**
     * Determine if the resource is authorizable.
     */
    public function authorizable(): bool
    {
        return true;
    }
}
