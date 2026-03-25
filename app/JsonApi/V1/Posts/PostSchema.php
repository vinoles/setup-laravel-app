<?php

namespace App\JsonApi\V1\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class PostSchema extends Schema
{
    /**
     * The model the schema corresponds to.
     */
    public static string $model = Post::class;

    /**
     * The maximum include path depth.
     */
    protected int $maxDepth = 3;

    /**
     * Get the resource fields.
     */
    public function fields(): array
    {
        return [
            ID::make()->uuid(),

            BelongsTo::make('author')->type('users'),

            HasMany::make('comments'),

            Str::make('uuid'),

            Str::make('content'),

            Str::make('slug'),

            BelongsToMany::make('tags'),

            Str::make('title')
                ->sortable(),

            DateTime::make('publishedAt')
                ->sortable(),

            DateTime::make('createdAt')
                ->sortable()
                ->readOnly(),

            DateTime::make('updatedAt')
                ->sortable()
                ->readOnly(),
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
     * Build an index query for this resource.
     */
    public function indexQuery(?Request $request, Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }

    /**
     * Build a query for finding a specific resource.
     * Allow finding published posts so authorization can be checked.
     * This is used when finding a single resource by ID (show, update, destroy).
     */
    public function queryOne(?Request $request, Builder $query): Builder
    {
        // For finding individual posts, allow published posts
        // Authorization will be checked by the policy
        return $query->whereNotNull('published_at');
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

    public function delete($post, ResourceRequest $request): bool
    {
        return $request->user()->can('delete', $post);
    }

    public function create(ResourceRequest $request): bool
    {
        return $request->user()->can('create');
    }

    public function update($post, ResourceRequest $request): bool
    {
        return $request->user()->can('update', $post);
    }
}
