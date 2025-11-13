<?php

namespace App\Http\Controllers\Admin\Helpers;

use App\Support\Database\SearchNormalizer;
use Illuminate\Database\Eloquent\Builder;

trait HandlesCrudSearches
{
    protected function applyTextSearch(Builder $query, string $column, ?string $searchTerm): void
    {
        $normalized = SearchNormalizer::value($searchTerm);

        if ($normalized === '') {
            return;
        }

        $query->orWhereRaw(
            SearchNormalizer::column($column) . ' LIKE ?',
            ["%{$normalized}%"]
        );
    }
}
