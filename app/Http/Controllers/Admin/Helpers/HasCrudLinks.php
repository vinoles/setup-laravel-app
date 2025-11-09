<?php

namespace App\Http\Controllers\Admin\Helpers;

use App\Support\Database\SearchNormalizer;

trait HasCrudLinks
{
    protected function linkColumn(string $entity, string $model, string $attribute, string $resource, array $searchAttributes): array
    {
        return [
            'name'        => "{$entity}_id",
            'type'        => 'select',
            'entity'      => $entity,
            'model'       => $model,
            'attribute'   => $attribute,
            'label'       => __("admin.globals.{$entity}"),
            'wrapper'     => [
                'element' => 'a',
                'href'    => static fn ($crud, $column, $entry, $related_key) => backpack_url(strtolower($resource) . '/' . $related_key . '/show'),
                'target'  => '_blank',
            ],
            'searchLogic' => $this->relationSearchLogic($entity, $searchAttributes),
        ];
    }

    protected function relationSearchLogic(string $relation, array $columns): \Closure
    {
        return function ($query, $column, $searchTerm) use ($relation, $columns) {
            $normalized = SearchNormalizer::value($searchTerm);

            if ($normalized === '') {
                return;
            }

            $query->orWhereHas($relation, function ($q) use ($columns, $normalized) {
                $parts = array_map(static fn ($attr) => SearchNormalizer::column($attr) . ' LIKE ?', $columns);
                $bindings = array_fill(0, count($parts), "%{$normalized}%");

                $q->whereRaw('(' . implode(' OR ', $parts) . ')', $bindings);
            });
        };
    }
}
