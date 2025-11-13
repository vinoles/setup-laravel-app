<?php

namespace App\Support\Database;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchNormalizer
{
    public static function column(string $column): string
    {
        $connection = DB::connection();
        $grammar = $connection->getQueryGrammar();
        $wrapped = $grammar->wrap($column);

        return match ($connection->getDriverName()) {
            'pgsql' => "LOWER(TRANSLATE(CAST({$wrapped} AS TEXT), 'áàäâãåéèëêíìïîóòöôõúùüûñç', 'aaaaaaeeeeiiiiooooouuuunc'))",
            'mysql', 'mariadb' => "LOWER(CONVERT({$wrapped} USING utf8mb4) COLLATE utf8mb4_unicode_ci)",
            default => "LOWER(CAST({$wrapped} AS TEXT))",
        };
    }

    public static function value(?string $value): string
    {
        return Str::of($value ?? '')
            ->ascii()
            ->lower()
            ->toString();
    }
}
