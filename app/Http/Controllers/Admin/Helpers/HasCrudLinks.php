<?php

namespace App\Http\Controllers\Admin\Helpers;

trait HasCrudLinks {
    public static function linkColumn($entity, $model, $attribute = 'name', $resource, $searchAttributes) {
        return [
            'name' => "{$entity}_id",
            'type' => 'select',
            'entity' => $entity,
            'model' => $model,
            'attribute' => $attribute,
            'wrapper' => [
                'element' => 'a',
                'href' => fn ($crud, $column, $entry, $related_key) =>
                    backpack_url(strtolower($resource) . '/' . $related_key . '/show'),
                'target' => '_blank',
            ],
            'searchLogic' => function ($query, $column, $searchTerm) use ($entity, $searchAttributes) {
                $query->orWhereHas($entity, function ($q) use ($searchTerm, $searchAttributes) {
                    $rawParts = [];
                    $bindings = [];

                    foreach ($searchAttributes as $attr) {
                        $rawParts[] = "LOWER($attr) LIKE ?";
                        $bindings[] = '%' . strtolower($searchTerm) . '%';
                    }

                    $rawQuery = '(' . implode(' OR ', $rawParts) . ')';

                    $q->whereRaw($rawQuery, $bindings);
                });
            },
        ];
    }
}
